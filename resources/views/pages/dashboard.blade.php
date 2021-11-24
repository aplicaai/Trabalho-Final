@extends('layouts.main') 
@section('title', 'Dashboard')
@section('content')
    <!-- push external head elements to head -->
    @push('head')

        <link rel="stylesheet" href="{{ asset('plugins/weather-icons/css/weather-icons.min.css') }}">
        <link rel="stylesheet" href="{{ asset('plugins/owl.carousel/dist/assets/owl.carousel.min.css') }}">
        <link rel="stylesheet" href="{{ asset('plugins/owl.carousel/dist/assets/owl.theme.default.min.css') }}">
        <link rel="stylesheet" href="{{ asset('plugins/chartist/dist/chartist.min.css') }}">
    @endpush

    <div class="container-fluid">
    	<div class="row">
                        <!-- SimpleFX widget MARKET OVERVIEW - START -->
<!-- SimpleFX widget MARKET OVERVIEW - START -->
<div class="sfx-widget" id="sfx-market-overview"></div>
<script type="text/javascript" src="https://widgets.simplefx.com/sfx-widget.js"></script>
<script type="text/javascript">
	sfx('marketOverview', {
		containerId: 'sfx-market-overview',
		language: 'pt',
		width: "1280px",
		height: "602px",
		symbols: ["PETROBRA.BR","ITAU.BR","VALE.BR","B3.BR","MAGALU.BR","COSAN.BR","SUZANO.BR","ABEV.BR"],
		theme: "dark",
		categoriesOrder: ["Equities BR"],
		defaultPeriod: "1M",
		customElements: ["header","exchange","sellBuy","chartGridLines"],


	})
</script>
<!-- SimpleFX widget - END -->

    	</div>
    </div>
	<!-- push external js -->
    @push('script')
        <script src="{{ asset('plugins/owl.carousel/dist/owl.carousel.min.js') }}"></script>
        <script src="{{ asset('plugins/chartist/dist/chartist.min.js') }}"></script>
        <script src="{{ asset('plugins/flot-charts/jquery.flot.js') }}"></script>
        <!-- <script src="{{ asset('plugins/flot-charts/jquery.flot.categories.js') }}"></script> -->
        <script src="{{ asset('plugins/flot-charts/curvedLines.js') }}"></script>
        <script src="{{ asset('plugins/flot-charts/jquery.flot.tooltip.min.js') }}"></script>

        <script src="{{ asset('plugins/amcharts/amcharts.js') }}"></script>
        <script src="{{ asset('plugins/amcharts/serial.js') }}"></script>
        <script src="{{ asset('plugins/amcharts/themes/light.js') }}"></script>
       
        
        <script src="{{ asset('js/widget-statistic.js') }}"></script>
        <script src="{{ asset('js/widget-data.js') }}"></script>
        <script src="{{ asset('js/dashboard-charts.js') }}"></script>
        
    @endpush
@endsection