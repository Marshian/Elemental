/*
 * jQuery Slugify plugin v1.0
 *
 * Copyright 2012, Ryun Shofner <ryun@humboldtweb.com>
 * Dual licensed under the MIT or GPL Version 2 licenses.
 *
 * Depends:
 *	jquery
 */
(function (window, $) {

    var char_map = {
        //Latin
        'À': 'A', 'Á': 'A', 'Â': 'A', 'Ã': 'A', 'Ä': 'A', 'Å': 'A', 'Æ': 'AE', 'Ç': 'C', 'È': 'E', 'É': 'E', 'Ê': 'E', 'Ë': 'E', 'Ì': 'I', 'Í': 'I', 'Î': 'I',
        'Ï': 'I', 'Ð': 'D', 'Ñ': 'N', 'Ò': 'O', 'Ó': 'O', 'Ô': 'O', 'Õ': 'O', 'Ö': 'O', 'Ő': 'O', 'Ø': 'O', 'Ù': 'U', 'Ú': 'U', 'Û': 'U', 'Ü': 'U', 'Ű': 'U',
        'Ý': 'Y', 'Þ': 'TH', 'ß': 'ss', 'à': 'a', 'á': 'a', 'â': 'a', 'ã': 'a', 'ä': 'a', 'å': 'a', 'æ': 'ae', 'ç': 'c', 'è': 'e', 'é': 'e', 'ê': 'e', 'ë': 'e',
        'ì': 'i', 'í': 'i', 'î': 'i', 'ï': 'i', 'ð': 'd', 'ñ': 'n', 'ò': 'o', 'ó': 'o', 'ô': 'o', 'õ': 'o', 'ö': 'o', 'ő': 'o', 'ø': 'o', 'ù': 'u', 'ú': 'u',
        'û': 'u', 'ü': 'u', 'ű': 'u', 'ý': 'y', 'þ': 'th', 'ÿ': 'y',

        //Greek
        'α': 'a', 'β': 'b', 'γ': 'g', 'δ': 'd', 'ε': 'e', 'ζ': 'z', 'η': 'h', 'θ': '8',
        'ι': 'i', 'κ': 'k', 'λ': 'l', 'μ': 'm', 'ν': 'n', 'ξ': '3', 'ο': 'o', 'π': 'p',
        'ρ': 'r', 'σ': 's', 'τ': 't', 'υ': 'y', 'φ': 'f', 'χ': 'x', 'ψ': 'ps', 'ω': 'w',
        'ά': 'a', 'έ': 'e', 'ί': 'i', 'ό': 'o', 'ύ': 'y', 'ή': 'h', 'ώ': 'w', 'ς': 's',
        'ϊ': 'i', 'ΰ': 'y', 'ϋ': 'y', 'ΐ': 'i',
        'Α': 'A', 'Β': 'B', 'Γ': 'G', 'Δ': 'D', 'Ε': 'E', 'Ζ': 'Z', 'Η': 'H', 'Θ': '8',
        'Ι': 'I', 'Κ': 'K', 'Λ': 'L', 'Μ': 'M', 'Ν': 'N', 'Ξ': '3', 'Ο': 'O', 'Π': 'P',
        'Ρ': 'R', 'Σ': 'S', 'Τ': 'T', 'Υ': 'Y', 'Φ': 'F', 'Χ': 'X', 'Ψ': 'PS', 'Ω': 'W',
        'Ά': 'A', 'Έ': 'E', 'Ί': 'I', 'Ό': 'O', 'Ύ': 'Y', 'Ή': 'H', 'Ώ': 'W', 'Ϊ': 'I',
        'Ϋ': 'Y',

        //Turkish
        'ş': 's', 'Ş': 'S', 'ı': 'i', 'İ': 'I', 'ç': 'c', 'Ç': 'C', 'ü': 'u', 'Ü': 'U',
        'ö': 'o', 'Ö': 'O', 'ğ': 'g', 'Ğ': 'G',

        //Russian
        'а': 'a', 'б': 'b', 'в': 'v', 'г': 'g', 'д': 'd', 'е': 'e', 'ё': 'yo', 'ж': 'zh',
        'з': 'z', 'и': 'i', 'й': 'j', 'к': 'k', 'л': 'l', 'м': 'm', 'н': 'n', 'о': 'o',
        'п': 'p', 'р': 'r', 'с': 's', 'т': 't', 'у': 'u', 'ф': 'f', 'х': 'h', 'ц': 'c',
        'ч': 'ch', 'ш': 'sh', 'щ': 'sh', 'ъ': '', 'ы': 'y', 'ь': '', 'э': 'e', 'ю': 'yu',
        'я': 'ya',
        'А': 'A', 'Б': 'B', 'В': 'V', 'Г': 'G', 'Д': 'D', 'Е': 'E', 'Ё': 'Yo', 'Ж': 'Zh',
        'З': 'Z', 'И': 'I', 'Й': 'J', 'К': 'K', 'Л': 'L', 'М': 'M', 'Н': 'N', 'О': 'O',
        'П': 'P', 'Р': 'R', 'С': 'S', 'Т': 'T', 'У': 'U', 'Ф': 'F', 'Х': 'H', 'Ц': 'C',
        'Ч': 'Ch', 'Ш': 'Sh', 'Щ': 'Sh', 'Ъ': '', 'Ы': 'Y', 'Ь': '', 'Э': 'E', 'Ю': 'Yu',
        'Я': 'Ya',

        //Ukranian
        'Є': 'Ye', 'І': 'I', 'Ї': 'Yi', 'Ґ': 'G', 'є': 'ye', 'і': 'i', 'ї': 'yi', 'ґ': 'g',

        //Czech
        'č': 'c', 'ď': 'd', 'ě': 'e', 'ň': 'n', 'ř': 'r', 'š': 's', 'ť': 't', 'ů': 'u',
        'ž': 'z', 'Č': 'C', 'Ď': 'D', 'Ě': 'E', 'Ň': 'N', 'Ř': 'R', 'Š': 'S', 'Ť': 'T',
        'Ů': 'U', 'Ž': 'Z',

        //Polish
        'ą': 'a', 'ć': 'c', 'ę': 'e', 'ł': 'l', 'ń': 'n', 'ó': 'o', 'ś': 's', 'ź': 'z',
        'ż': 'z', 'Ą': 'A', 'Ć': 'C', 'Ę': 'e', 'Ł': 'L', 'Ń': 'N', 'Ó': 'o', 'Ś': 'S',
        'Ź': 'Z', 'Ż': 'Z',

        //Latvian
        'ā': 'a', 'č': 'c', 'ē': 'e', 'ģ': 'g', 'ī': 'i', 'ķ': 'k', 'ļ': 'l', 'ņ': 'n',
        'š': 's', 'ū': 'u', 'ž': 'z', 'Ā': 'A', 'Č': 'C', 'Ē': 'E', 'Ģ': 'G', 'Ī': 'i',
        'Ķ': 'k', 'Ļ': 'L', 'Ņ': 'N', 'Š': 'S', 'Ū': 'u', 'Ž': 'Z',

        //Lithuanian
        'ą': 'a', 'č': 'c', 'ę': 'e', 'ė': 'e', 'į': 'i', 'š': 's', 'ų': 'u', 'ū': 'u',
        'ž': 'z', 'Ą': 'A', 'Č': 'C', 'Ę': 'E', 'Ė': 'E', 'Į': 'I', 'Š': 'S', 'Ų': 'U',
        'Ū': 'U', 'Ž': 'Z',

        //Currency
        '€': 'euro', '₢': 'cruzeiro', '₣': 'french franc', '£': 'pound',
        '₤': 'lira', '₥': 'mill', '₦': 'naira', '₧': 'peseta', '₨': 'rupee',
        '₩': 'won', '₪': 'new shequel', '₫': 'dong', '₭': 'kip', '₮': 'tugrik',
        '₯': 'drachma', '₰': 'penny', '₱': 'peso', '₲': 'guarani', '₳': 'austral',
        '₴': 'hryvnia', '₵': 'cedi', '¢': 'cent', '¥': 'yen', '元': 'yuan',
        '円': 'yen', '﷼': 'rial', '₠': 'ecu', '¤': 'currency', '฿': 'baht',

        //Symbols
        '©': '(c)', 'œ': 'oe', 'Œ': 'OE', '∑': 'sum', '®': '(r)', '†': '+',
        '“': '"', '”': '"', '‘': "'", '’': "'", '∂': 'd', 'ƒ': 'f', '™': 'tm',
        '℠': 'sm', '…': '...', '˚': 'o', 'º': 'o', 'ª': 'a', '•': '*',
        '∆': 'delta', '∞': 'infinity', '♥': 'love', '&': 'and'
    };

    var Slugify = function (e, cfg) {
        this.cfg = cfg || {};

        if (typeof this.cfg.slug === 'undefined') {
            console.error('Error no slug field');
            return;
        }
        this.separator = this.cfg.separator || '_';
        this.$slug = $(this.cfg.slug);
        this.$title = $(e);

        this.register_events();
    };

    Slugify.prototype = {
        encode: function (str) {
            if (typeof str != 'undefined') {
                var slug = '';
                str = $.trim(str);

                for (var i = 0, len = str.length; i < len; i++) {
                    slug += (char_map[str.charAt(i)]) ? char_map[str.charAt(i)] : str.charAt(i);
                }

                return slug.toLowerCase().replace(/-+/g, '').replace(/\s+/g, this.separator).replace(/[^a-z0-9_\-]/g, '');
            }
        },
        register_events: function () {
            var me = this, $slug = this.$slug;

            if (this.isEnabled()) {
                this.enable();

                // Check if it's empty first and populate if so
                if ($slug.val().trim() === '') {
                    $slug.trigger('change');
                    $slug.val(me.encode(me.$title.val()));
                }
            }
        },
        enable: function () {
            var me = this;
            me.$title.keyup(function (e) {
                me.$slug.val(me.encode(e.currentTarget.value));
                me.$slug.trigger('change');
            });
            this.cfg.enabled = true;
        },
        disable: function () {
            this.$title.off('keyup');
            this.cfg.enabled = false;
        },
        isEnabled: function () {
            return this.cfg.enabled === true;
        }
    };

    $.fn.slugify = function (option) {
        return this.each(function () {
            var $this = $(this)
                , data = $this.data('slugify')
                , options = $.extend({}, $.fn.slugify.defaults, $this.data(), typeof option === 'object' && option);
            if (!data) $this.data('slugify', (data = new Slugify(this, options)));
            if (typeof option === 'string') data[option]();
        })
    };
    $.fn.slugify.defaults = {
        slug: '#slug',
        separator: '-',
        enabled: true,
    };
    window.Slugify = Slugify;

})(window, jQuery);
