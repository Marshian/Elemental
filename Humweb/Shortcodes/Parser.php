<?php

namespace Humweb\Shortcodes;

class Parser
{
    protected $shortcodes = [];

    /**
     * Register a shortcode, and attach it to a PHP callback.
     *     *.
     *
     * @param string   $name     The shortcode tag to map to the callback - normally in lowercase_underscore format.
     * @param callback $callback The callback to replace the shortcode with.
     */
    public function register($name, $callback)
    {
        if (is_callable($callback)) {
            $this->shortcodes[$name] = $callback;
        }
    }

    /**
     * Check if a shortcode has been registered.
     *
     * @param string $shortcode
     *
     * @return bool
     */
    public function registered($name)
    {
        return array_key_exists($name, $this->shortcodes);
    }

    /**
     * Remove a specific registered shortcode.
     *
     * @param string $shortcode
     */
    public function unregister($name)
    {
        if ($this->registered($name)) {
            unset($this->shortcodes[$name]);
        }
    }

    /**
     * Remove all registered shortcodes.
     */
    public function clear()
    {
        $this->shortcodes = [];
    }

    // -----------------------------------------------------------------------------------------------------------------

    /**
     * Parse a string, and replace any registered shortcodes within it with the result of the mapped callback.
     *
     * @param string $content
     *
     * @return string
     */
    public function parse($content)
    {
        if (!$this->shortcodes) {
            return $content;
        }

        $shortcodes = implode('|', array_map('preg_quote', array_keys($this->shortcodes)));

        $pattern = "/(.?)\[($shortcodes)(.*?)(\/)?\](?(4)|(?:(.+?)\[\/\s*\\2\s*\]))?(.?)/s";

        return preg_replace_callback($pattern, [$this, 'handleShortcode'], $content);
    }

    protected function handleShortcode($matches)
    {
        $prefix = $matches[1];
        $suffix = $matches[6];
        $name = $matches[2];

        // allow for escaping shortcodes [[shortcode]]
        if ($prefix == '[' && $suffix == ']') {
            return substr($matches[0], 1, -1);
        }

        $attributes = [];

        // Parse attributes to array.
        if (preg_match_all('/(\w+) *= *(?:([\'"])(.*?)\\2|([^ "\'>]+))/', $matches[3], $match, PREG_SET_ORDER)) {
            foreach ($match as $attribute) {
                if (!empty($attribute[4])) {
                    $attributes[strtolower($attribute[1])] = $attribute[4];
                } elseif (!empty($attribute[3])) {
                    $attributes[strtolower($attribute[1])] = $attribute[3];
                }
            }
        }

        return $prefix.call_user_func_array($this->shortcodes[$name], [$attributes, $matches[5], $this, $name]).$suffix;
    }
}
