@if ($breadcrumbs)
<div class="breadcrumbs">
    <div class="container">
        <ol class="breadcrumb breadcrumb1 animated wow slideInLeft animated" data-wow-delay=".5s" style="visibility: visible; animation-delay: 0.5s; animation-name: slideInLeft;">
        	 @foreach ($breadcrumbs as $breadcrumb)
        	 	@if (!$breadcrumb->last)
		            <li>
		            	<a href="{{ $breadcrumb->url }}">
		            		<span class="glyphicon glyphicon-home" aria-hidden="true"></span>Home
		            	</a>
		            </li>
	            @else
	            	<li class="active">{{ $breadcrumb->title }}</li>
	            @endif
            @endforeach
        </ol>
    </div>
</div>
@endif