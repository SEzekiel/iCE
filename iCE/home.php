<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Home</title>
	<link rel="stylesheet" href="http://code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.css" />
	<link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Open+Sans:300,400,700">
	<script>
		$( document ).on( "pageinit", "#demo-page", function() {

			$( document ).on( "swipeleft swiperight", "#demo-page", function( e ) {
				// We check if there is no open panel on the page because otherwise
				// a swipe to close the left panel would also open the right panel (and v.v.).
				// We do this by checking the data that the framework stores on the page element (panel: open).
				if ( $.mobile.activePage.jqmData( "panel" ) !== "open" ) {
					if ( e.type === "swipeleft"  ) {
						$( "#right-panel" ).panel( "open" );
					} else if ( e.type === "swiperight" ) {
						$( "#left-panel" ).panel( "open" );
					}
				}
			});
		});
    </script>
	<style>
		/* Swipe works with mouse as well but often causes text selection. */
		#demo-page * {
			-webkit-user-select: none;
			-moz-user-select: none;
			-ms-user-select: none;
			-o-user-select: none;
			user-select: none;
		}
		/* Arrow only buttons in the header. */
		#demo-page .ui-header .ui-btn {
			background: none;
			border: none;
			top: 9px;
		}
		#demo-page .ui-header .ui-btn-inner {
			border: none;
		}
		/* Content styling. */
		dl { font-family: "Times New Roman", Times, serif; padding: 1em; }
		dt { font-size: 2em; font-weight: bold; }
		dt span { font-size: .5em; color: #777; margin-left: .5em; }
		dd { font-size: 1.25em;	margin: 1em 0 0; padding-bottom: 1em; border-bottom: 1px solid #eee; }
		.back-btn { float: right; margin: 0 2em 1em 0; }
	</style>
</head>
<body>

<div data-role="page" id="demo-page" data-theme="d">

    <div data-role="header" data-theme="a">
        <div data-role="navbar" style="height: 50px">
            <ul style="margin-top:-35px">
                <li><a href="#left-panel" data-icon="grid">Options</a></li>
                <li style="margin-top: -20px"><a href="#" data-icon="star" class="ui-btn-active">Favs</a></li>
                <li style="margin-top: -20px"><a href="#" data-icon="gear">Setup</a></li>
            </ul>
        </div><!-- /navbar -->
    </div><!-- /header -->

    <div data-role="panel" id="left-panel" data-theme="b">

    	<p>Left reveal panel.</p>
		<a href="#" data-rel="close" data-role="button" data-mini="true" data-inline="true" data-icon="delete" data-iconpos="right">Close</a>

    </div><!-- /panel -->

<ul data-role="listview" data-inset="true">
    <li><a href="#"><img src="../_assets/img/gf.png" alt="France" class="ui-li-icon ui-corner-none">France</a></li>
    <li><a href="#"><img src="../_assets/img/de.png" alt="Germany" class="ui-li-icon">Germany</a></li>
    <li><a href="#"><img src="../_assets/img/gb.png" alt="Great Britain" class="ui-li-icon">Great Britain</a></li>
    <li><a href="#"><img src="../_assets/img/fi.png" alt="Finland" class="ui-li-icon">Finland</a></li>
    <li><a href="#"><img src="../_assets/img/us.png" alt="United States" class="ui-li-icon ui-corner-none">United States</a></li>
</ul>

<div data-role="popup" id="purchase" data-theme="a" data-overlay-theme="b" class="ui-content" style="max-width:340px; padding-bottom:2em;">
    <h3>Purchase Album?</h3>
<p>Your download will begin immediately on your mobile device when you purchase.</p>
    <a href="index.html" data-rel="back" class="ui-shadow ui-btn ui-corner-all ui-btn-b ui-icon-check ui-btn-icon-left ui-btn-inline ui-mini">Buy: $10.99</a>
    <a href="index.html" data-rel="back" class="ui-shadow ui-btn ui-corner-all ui-btn-inline ui-mini">Cancel</a>
</div>

</div><!-- /page -->

<script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
<script src="http://code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.js"></script>
</body>
</html>