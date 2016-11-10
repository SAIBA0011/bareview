@extends('layouts.master')

@section('content')
<section id="home" class="home boxed">

	@if(count($featured) <= 1)
		<div class="container">
			
			<div class="eight columns">
				<h1 class="title">{{ $featured->name }}</h1>
				
				<div class="subtitle">
					<p class="small">
	                    {{ nl2br($featured->description) }}
	                </p>
				</div>
				<a href="/editions/{{ $featured->id }}/read" target="_blank" class="button purchase-button">Read Edition</a>
				<a href="/editions/{{ $featured->id }}/download" class="button purchase-button">Download Edition</a>
			</div>

			
			<div class="eight columns">
				<img src="{{$featured->featured_img }}" alt="{{ $featured->name }}">
			</div>

		</div>
	@endif
</section>

<section id="editions" class="overview boxed">

	<div class="section-header">
		<h3 class="title"><span class="title-highlight">Previous</span> Editions</h3>

		<p class="description">
			Here you can find all the previous editions if you might have missed one it will be available for viewing here.
		</p>
	</div>

	@if(count($editions))
	@foreach($editions->chunk(4) as $chunk)
	<div class="container">
		@foreach($chunk as $edition)
			<div class="four columns">
				<div class="chapter-block">
					<h4 class="chapter-no">{{ $edition->release_date->format('F Y') }}</h4>

					<div class="chapter-preview-img">
						<a href="/editions/{{ $edition->id }}/download"><img style="height:259px" title="Back to Business" alt="{{ $edition->name }}" src="{{ $edition->cover_img }}" /></a>
					</div>

					<h5 class="chapter-title">{{ $edition->name }}</h5>

				</div>
			</div>
		@endforeach
	</div>
	@endforeach
	@else
	<p style="text-align:center">There are currently no other Editions, check back later.</p>
	@endif
</section>

<section id="cta" class="cta boxed">
	<div class="container">

		<span class="cta-txt">Get the Latest Accounting News Free</span>
		<a href="http://accountingweekly.com" class="button purchase-button">Accounting Weekly</a>

	</div>
</section>

<section id="author" class="author boxed">

	<div class="section-header">
		<h3 class="title">About The <span class="title-highlight">Magazine</span></h3>

		<p class="description">
			Informative, Exclusive, Credible 
		</p>

		<p class="description" style="text-align: justify">
		The Business Accounting Review is published four times a year and distributed to more than 5000 accounting and financial professionals, affiliated with the Southern African Institute for Business Accountants (SAIBA) and more than 10 000 finance associates. The BA Review is a digital magazine, which allows advertisers tracking and measurability. The BA Review is the flagship publication of SAIBA. This magazine is targeted at Accounting and Finance Professionals. This magazine is our commitment to developing a truly indigenous accountancy profession in Southern Africa and is based on a Masters in Business Administration (MBA) with Accounting-related subjects, focusing on business and practice topics in application. The aim is to become the go-to publication for business and accounting needs. The articles cover the following: Institute and Industry news, Finance, General Accounting, Leadership, Business Strategy, Practice Management, Business Communication, IT, Human Resources, Reviews, Profiles, Lifestyle, Students and our new CFO section.
		</p>

	</div>

</section>
@stop