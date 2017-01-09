@if (isset($quick_links))
	@foreach ($quick_links as $link)
		<a href="{{ $link['url'] }}" class="button small" >{{ $link['label'] }}</a>
	@endforeach
@endif