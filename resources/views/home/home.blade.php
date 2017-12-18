@extends('layouts.app')
@section('content')
	<style>
		.ui-combobox {
			position: relative;
			display: inline-block;
		}
		.ui-combobox-toggle {
			position: absolute;
			top: 0;
			bottom: 0;
			margin-left: -1px;
			padding: 0;
			/* support: IE7 */
			*height: 1.7em;
			*top: 0.1em;
		}
		.ui-combobox-input {
			margin: 0;
			padding: 0.3em;
		}
	</style>
{{--	{{ dd($location) }}--}}

	<?php
//    $request = \Request::instance();
//    //$request->setTrustedProxies(array('127.0.0.1')); // only trust proxy headers coming from the IP addresses on the array (change this to suit your needs)
//    $ip = $request->getClientIp();
//    dd($request);
	?>

			
            <div class="hero" data-bg-image="{{ asset('images/banner-new.jpg') }}">
				<div class="container">
					<form action="#" class="find-location">
						<input type="text" id="awxSearchTextBox" class="awxSearchTextBox" placeholder="Find your location...">
						<input type="hidden" disabled id="postalCode" value="{{ $location->postal_code }}">
					</form>
				</div>
			</div>
			<div class="forecast-table">
				<div class="container">
					<div class="forecast-container">
						<div class="today forecast">
							<div class="forecast-header">
								<div class="day">{{ \Carbon::now()->format('l') }}</div>
								<div class="date">{{ \Carbon::now()->format('d M') }}</div>
							</div> <!-- .forecast-header -->
							<div class="forecast-content">
								<div class="location" id="location"></div>
								<div class="degree">
									<div class="num">23<sup>o</sup>C</div>
									<div class="forecast-icon">
										<img src="{{ asset('images/icons/icon-1.svg') }}" alt="" width=90>
									</div>	
								</div>
								<span><img src="{{ asset('images/icon-umberella.png') }}" alt="">20%</span>
								<span><img src="{{ asset('images/icon-wind.png') }}" alt="">18km/h</span>
								<span><img src="{{ asset('images/icon-compass.png') }}" alt="">East</span>
							</div>
						</div>
						@for($i = 1; $i < 7; $i++)
							<div class="forecast">
								<div class="forecast-header">
									<div class="day">{{ \Carbon::now()->addDays($i)->format('l')  }}</div>
								</div> <!-- .forecast-header -->
								<div class="forecast-content">
									<div class="forecast-icon">
										<img src="{{ asset('images/icons/icon-3.svg') }}" alt="" width=48>
									</div>
									<div class="degree">23<sup>o</sup>C</div>
									<small>18<sup>o</sup></small>
								</div>
							</div>
						@endfor
						{{--<div class="forecast">--}}
							{{--<div class="forecast-header">--}}
								{{--<div class="day">Wednesday</div>--}}
							{{--</div> <!-- .forecast-header -->--}}
							{{--<div class="forecast-content">--}}
								{{--<div class="forecast-icon">--}}
									{{--<img src="{{ asset('images/icons/icon-5.svg') }}" alt="" width=48>--}}
								{{--</div>--}}
								{{--<div class="degree">23<sup>o</sup>C</div>--}}
								{{--<small>18<sup>o</sup></small>--}}
							{{--</div>--}}
						{{--</div>--}}
						{{--<div class="forecast">--}}
							{{--<div class="forecast-header">--}}
								{{--<div class="day">Thursday</div>--}}
							{{--</div> <!-- .forecast-header -->--}}
							{{--<div class="forecast-content">--}}
								{{--<div class="forecast-icon">--}}
									{{--<img src="{{ asset('images/icons/icon-7.svg') }}" alt="" width=48>--}}
								{{--</div>--}}
								{{--<div class="degree">23<sup>o</sup>C</div>--}}
								{{--<small>18<sup>o</sup></small>--}}
							{{--</div>--}}
						{{--</div>--}}
						{{--<div class="forecast">--}}
							{{--<div class="forecast-header">--}}
								{{--<div class="day">Friday</div>--}}
							{{--</div> <!-- .forecast-header -->--}}
							{{--<div class="forecast-content">--}}
								{{--<div class="forecast-icon">--}}
									{{--<img src="{{ asset('images/icons/icon-12.svg') }}" alt="" width=48>--}}
								{{--</div>--}}
								{{--<div class="degree">23<sup>o</sup>C</div>--}}
								{{--<small>18<sup>o</sup></small>--}}
							{{--</div>--}}
						{{--</div>--}}
						{{--<div class="forecast">--}}
							{{--<div class="forecast-header">--}}
								{{--<div class="day">Saturday</div>--}}
							{{--</div> <!-- .forecast-header -->--}}
							{{--<div class="forecast-content">--}}
								{{--<div class="forecast-icon">--}}
									{{--<img src="{{ asset('images/icons/icon-13.svg') }}" alt="" width=48>--}}
								{{--</div>--}}
								{{--<div class="degree">23<sup>o</sup>C</div>--}}
								{{--<small>18<sup>o</sup></small>--}}
							{{--</div>--}}
						{{--</div>--}}
						{{--<div class="forecast">--}}
							{{--<div class="forecast-header">--}}
								{{--<div class="day">Sunday</div>--}}
							{{--</div> <!-- .forecast-header -->--}}
							{{--<div class="forecast-content">--}}
								{{--<div class="forecast-icon">--}}
									{{--<img src="{{ asset('images/icons/icon-14.svg') }}" alt="" width=48>--}}
								{{--</div>--}}
								{{--<div class="degree">23<sup>o</sup>C</div>--}}
								{{--<small>18<sup>o</sup></small>--}}
							{{--</div>--}}
						{{--</div>--}}
					</div>
				</div>
				{{--<div class="container">--}}
					{{--<p><strong>Headline: </strong>"<span id="headline"></span>"</p>--}}
				{{--</div>--}}
			</div>

@endsection

@section('pageScripts')

	<script>
		$(document).ready(function (){
//		    console.log('1: ', window.postalCode.term, $.now);
		});
	</script>

@endsection
