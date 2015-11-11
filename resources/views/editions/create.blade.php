@extends('layouts.master')

@section('content')
<section id="home" class="home">
	
</section>
<section class="contact boxed" id="app">
	<div class="section-header">
		<h3 class="title"><span class="title-highlight">Create</span> New Edition</h3>

		<p class="description">
			
		</p>
	</div>

	<div class="container">
		<div class="twelve columns offset-by-two">
			
			<form method="post" @submit.prevent="submitForm" id="contact-form" class="contact-form" enctype="multipart/form-data">
				<label for="name">Edition Name</label>
				<input type="text" name="name" v-model="newEdition.name" id="name" placeholder="Edition Name" />

				<label for="description">Edition Description</label>
				<textarea name="description" v-model="newEdition.description" id="description" placeholder="Edition Description"></textarea>
				
				<label for="release_date">Edition Release Date</label>
				<input type="text" name="release_date" v-model="newEdition.release_date" id="release_date" placeholder="Release Date eg. 2015/10/10" />

				<div class="container">
					<div class="six columns">
					<label for="cover_img">Edition Cover Image</label>
					<input type="file" name="cover_img" id="cover_img" v-el:cover/>
				</div>
				<div class="six columns">
					<label for="featured_img">Edition Featured Image</label>
					<input type="file" name="featured_img" id="featured_img" v-el:featured/>
				</div>
				</div>

				<div class="container">
					<div class="six columns">
						<label for="online">Edition Online SWF</label>
						<input type="file" name="online" id="online" v-el:online/>
					</div>
					<div class="six columns">
						<label for="pdf">Edition PDF</label>
						<input type="file" name="pdf" id="pdf" v-el:pdf/>
					</div>
				</div>

				<button type="submit" class="button" v-bind:class="{'btn-disable': processing}">
						<span v-if="! processing">Create Edition</span>
						<span v-else>Creating, Please wait... </span>
						<span class="fa fa-spin fa-spinner" v-show="processing"></span>
				</button>
			</form>

		</div>
	</div>
</section>
@stop