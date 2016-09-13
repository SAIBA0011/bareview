@extends('layouts.master')

@section('content')
<section id="home" class="home boxed">

	@if($featured)
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
	@endif()
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

<div class="modal fade" id="cfoWorldCongress" tabindex="-1" role="dialog" aria-labelledby="cfoWorldCongressLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header" style="background:#c63538">
      <img class="pull-right" src="images/iafei-logo.png" alt="CFO World Congress" width="300">
        {{-- <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button> --}}
        <h3 class="modal-title" style="color:#ffffff; margin-top:20px;">Interested in the CFO World Congress?</h3>
      </div>
      <div class="modal-body">    

        <p style="font-size:18px;">SAIBA is hosting the 46th CFO World Congress this November in Cape Town. Join the World Congress for CFOs and Financial Managers. Join 21 000 global and local finance leaders. 
        <br><br>
        <strong>9 - 10 November 2016.  Cape Town, CTICC</strong>.</p> 

      </div>
      <div class="modal-footer">
      <form action="https://bulkro.com/admin/subscribe" method="POST" accept-charset="utf-8" class="form-inline pull-left">
          <div class="form-group">
            <input class="form-control" type="text" name="email" placeholder="Email" id="email"/>
            <input type="hidden" name="list" value="KWCnKATFHcguF7nCPZ6FFw"/>
            <button class="btn btn-success" data-toggle="tooltip" data-placement="top" title="You will be redirected to the CFO World Congress Website" type="submit" name="submit" id="submit"/>Yes, I'm interested</button>
          </div>

          <div class="form-group">
            <button type="button" class="btn" data-dismiss="modal">No Thanks</button>
          </div>
      </form>
        
      </div>
    </div>
  </div>
</div>
@stop