
<style>
    #mapCanvas {
        width: 100%;
        height: 300px;  
    }
    #infoPanel {

        margin: 10px;
    }
    #infoPanel div {
        margin-bottom: 5px;
    }
    .no_margin {
        margin-bottom:0px;
    }
    .content  {
        min-height:350px;
    }
</style>

<div id="form_prev" class="modal fade" aria-hidden="true" aria-labelledby="mymodalLabel" role="dialog" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button class="close" aria-hidden="true" data-dismiss="modal" type="button" id="close">×</button>
                <h4 id="title" class="modal-title"></h4>
            </div>
            <div class="modal-body">
                <div class="agent-contact-form"> 
                  <!--<h4><span class="accent-color">Select a Subcategory</span></h4>-->

                    <div class="form-group">
                        <label>Select a Subcategory <span style="color:red ;class="required">*</span> </label>
                        <select class="form-control" id="sub_cat">
                        </select>
                        <span id="val_subcat" style="display:none" class="formError"><font color="#F44336">Please Select a Subcategory</font></span> </div>
                    <div class="form-group">
                        <label>Select a District  <span style="color:red ;class="required">*</span> </label>
                        <select class="form-control" id="district">
                        </select>
                        <span id="val_dist" style="display:none" class="formError"><font color="#F44336">Please Select a District</font></span> </div>
                    <div class="form-group">
                        <label>Select Postal Area  <span style="color:red ;class="required">*</span>  </label>
                        <select class="form-control" id="city">
                        </select>
                        <span id="val_city" style="display:none" class="formError"><font color="#F44336">Please Select a Postal Area</font></span> 
						</div>
						
                    <div class="form-group">
                        <label>Address Line 01 <span style="color:red ;class="required">*</span> </label>
                        <div class="input-group"> <span class="input-group-addon"><i class="fa fa-home"></i></span>
                            <input type="text" id="house_no" class="form-control">
                        </div>
                        <span id="val_house_no" style="display:none" class="formError"><font color="#F44336">Please Enter Address Line 01</font></span> 
						</div>
						
                    <div class="form-group">
                        <label>Address Line 02 <span style="color:red ;class="required">*</span></label>
                        <div class="input-group"> <span class="input-group-addon"><i class="fa fa-home"></i></span>
                            <input type="text" id="house_name" class="form-control">
                        </div>
                        <span id="val_house_name" style="display:none" class="formError"><font color="#F44336">Please Enter Address Line 02</font></span> 
						</div>
						
                    <div class="form_prev">
                        <label>Address Line 03</label>
                        <div class="input-group"> <span class="input-group-addon" style="padding: 0 15px;"><i class="fa fa-home"></i></span>
                            <input type="text" id="street" class="form-control">
                        </div>
                        <span id="val_street" style="display:none" class="formError"><font color="#F44336">Please Enter Address Line 03</font></span>
                    </div>
					
                    <input type="hidden" id="cat">
                    <div class="row" id="map">
                        <div class="col-md-12">
                            <div id="mapCanvas"></div>
                            <div id="infoPanel"> <b>Marker status:</b>
                                <div id="markerStatus"><i>Click and drag the marker.</i></div>
                                <b>Current position:</b>
                                <div id="info"></div>
                                <input type="hidden" id="lat" />
                                <input type="hidden" id="lng" />
                                <b>Closest matching address:</b>
                                <div id="address"></div>
                            </div>
                        </div>
                    </div>
                    <button  class="btn btn-primary pull-right" id="next_btn">NEXT</button>
                </div>
                <div class="clearfix"></div>
            </div>
            <div class="modal-footer">
                <button class="btn btn-default inverted" data-dismiss="modal" type="button" id="close">Close</button>
            </div>
        </div>
    </div>
</div>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAuWch6HsB-2Xj_a7gr0VpM-JJNOrLdMtE&v=3.exp&sensor=false"></script> 
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script type="text/javascript">
    load_district();

    $("#car").click(function () {
        var cat = 1;
        document.getElementById('title').innerHTML = 'SOUNDKADE.LK SPEAKERS';
        $('#cat').val(cat);
        load_subcat(cat);
    });

    $("#home").click(function () {
        var cat = 4;
        document.getElementById('title').innerHTML = 'STOCK CLEARENCE & SALES';
        load_subcat(cat);
        $('#cat').val(cat);
    });

    $("#land").click(function () {
        var cat = 2;
        document.getElementById('title').innerHTML = 'OTHER SPEAKERS';
        load_subcat(cat);
        $('#cat').val(cat);
    });

    $("#labour").click(function () {
        var cat = 3;
        document.getElementById('title').innerHTML = 'MUSIC INSTRUMENTS';
        load_subcat(cat);
        $('#cat').val(cat);
    });

    $("#marriage").click(function () {
        var cat = 5;
        document.getElementById('title').innerHTML = 'ACCESSORIES';
        load_subcat(cat);
        $('#cat').val(cat);
    });

    $("#other").click(function () {
        var cat = 6;
        document.getElementById('title').innerHTML = 'OTHER';
        load_subcat(cat);
        $('#cat').val(cat);
    });

    function load_subcat(cat) {
        $.post('../connection/form_prev_con.php', {'get_subcat': 'data', cat_id: cat}, function (data) {
            $("#sub_cat").html(data);
        });
    }

    function load_district() {
        $.post('../connection/form_prev_con.php', {'get_district': 'data'}, function (data) {
            $("#district").html(data);
        });
    }

    $('#district').change(function () {
        $('#map').hide();
        var id = $(this).val();
        load_city(id);
    });

    function load_city(id) {
        $.post('../connection/form_prev_con.php', {'get_city': 'data', id: id}, function (data) {
            $("#city").html(data);
        });
    }

    $(function () {
        $("#next_btn").click(function () {
            subcat_validate();
            district_validate();
            city_validate();
            //house_no_validate();
            //house_name_validate();
            //street_validate();

            if (subcat_val && dist_val && city_val) {
                var subcat = $('#sub_cat').val();
                var cat = $('#cat').val();
                var dist = $('#district').val();
                var city = $('#city').val();
                var lat = $('#lat').val();
                var lng = $('#lng').val();
                //var house_no = $('#house_no').val(); 
				//var house_name = $('#house_name').val();
                var street = $('#street').val();

                post('../connection/form_prev.php', {cat: cat, subcat: subcat, district: dist, city: city, lat: lat, lng: lng});
            }
        });
    });

    function post(path, params, method) {
        method = method || "get"; // Set method to post by default if not specified.
        var form = document.createElement("form");
        form.setAttribute("method", method);
        form.setAttribute("action", path);

        for (var key in params) {
            if (params.hasOwnProperty(key)) {
                var hiddenField = document.createElement("input");
                hiddenField.setAttribute("type", "hidden");
                hiddenField.setAttribute("name", key);
                hiddenField.setAttribute("value", params[key]);

                form.appendChild(hiddenField);
            }
        }

        document.body.appendChild(form);
        form.submit();
    }

    var subcat_val = true;
    function subcat_validate() {
        if ($('#sub_cat').val() === '') {
            subcat_val = false;
            $('#val_subcat').fadeIn();
            display_error_msg();
            //scrollTo(0, 0);
            $('#form_prev').animate({
                scrollTop: $("#sub_cat").offset().top
            }, 2000);
        } else {
            subcat_val = true;
            clear_validation();
        }
    }

    var dist_val = true;
    function district_validate() {
        if ($('#district').val() === '') {
            dist_val = false;
            $('#val_dist').fadeIn();
            display_error_msg();
            $('#form_prev').animate({
                scrollTop: $("#sub_cat").offset().top
            }, 2000);
        } else {
            dist_val = true;
            clear_validation();
        }
    }

    var city_val = true;
    function city_validate() {
        if ($('#city').val() === '') {
            city_val = false;
            $('#val_city').fadeIn();
            display_error_msg();
            $('#map').hide();
            $('#form_prev').animate({
                scrollTop: $("#sub_cat").offset().top
            }, 2000);
        } else {
            city_val = true;
            clear_validation();
        }
    }

    var house_no_val = true;
    function house_no_validate() {
        if ($('#house_no').val() === '') {
            house_val = false;
            $('#val_house_no').fadeIn();
            display_error_msg();
            $('#form_prev').animate({
                scrollTop: $("#sub_cat").offset().top
            }, 2000);
        } else {
            house_no_val = true;
            clear_validation();
        }
    }

    var house_name_val = true;
    function house_name_validate() {
        if ($('#house_name').val() === '') {
            house_name_val = false;
            $('#val_house_name').fadeIn();
            display_error_msg();
            $('#form_prev').animate({
                scrollTop: $("#sub_cat").offset().top
            }, 2000);
        } else {
            house_name_val = true;
            clear_validation();
        }
    }

    var street_val = true;
    function street_validate() {
        if ($('#street').val() === '') {
            street_val = false;
            $('#val_street').fadeIn();
            display_error_msg();
            $('#form_prev').animate({
                scrollTop: $("#sub_cat").offset().top
            }, 2000);
        } else {
            street_val = true;
            clear_validation();
        }
    }

    //display for error msg
    function display_error_msg() {
        if ($('#sub_cat').val() === '') {
            $('#val_subcat').fadeIn();
            $("#sub_cat").addClass("no_margin")
        }

        if ($('#district').val() === '') {
            $('#val_dist').fadeIn();
            $("#district").addClass("no_margin")
        }

        if ($('#city').val() === '') {
            $('#val_city').fadeIn();
            $("#city").addClass("no_margin")
        }

        if ($('#house_no').val() === '') {
            $('#val_house_no').fadeIn();
        }

        if ($('#house_name').val() === '') {
            $('#val_house_name').fadeIn();
        }

        /*if ($('#street').val() === '') {
            $('#val_street').fadeIn();
        }*/
    }

    function clear_validation() {

        if ($('#sub_cat').val() != '') {
            $('#val_subcat').fadeOut();
        }

        if ($('#district').val() != '') {
            $('#val_dist').fadeOut();
        }

        if ($('#city').val() != '') {
            $('#val_city').fadeOut();
        }

        if ($('#house_no').val() != '') {
            $('#val_house_no').fadeOut();
        }

        if ($('#house_name').val() != '') {
            $('#val_house_name').fadeOut();
        }

        if ($('#street').val() != '') {
            $('#val_street').fadeOut();
        }

    }

    $('.form-control').focusin(function () {
        $('.formError').fadeOut();
    });

</script>

<!-- Map ---> 
<script type="text/javascript">

    $('document').ready(function (e) {
        $('#map').hide();
    });

    $("#city").change(function () {
        var id = $(this).val();

        if (id === '') {
            $('#map').hide();

        } else {
            $('#map').show();

            $.post('../connection/form_prev_con.php', {'get_city_name': 'data', id: id}, function (data) {

                var map;
                var marker = null;
                initialize();
                function initialize() {
                    var mapOptions = {
                        zoom: 8,
                        disableDefaultUI: true,
                        center: new google.maps.LatLng(7.8731, 80.7718), //center on sherbrooke
                        mapTypeId: google.maps.MapTypeId.ROADMAP
                    };
                    map = new google.maps.Map(document.getElementById('mapCanvas'), mapOptions);
                    google.maps.event.addListener(map, 'click', function (event) {
                        //call function to create marker
                        $("#coordinate").val(event.latLng.lat() + ", " + event.latLng.lng());
                        $("#coordinate").select();
                        //delete the old marker
                        if (marker) {
                            marker.setMap(null);
                        }
                        //creer à la nouvelle emplacement
                        marker = new google.maps.Marker({position: event.latLng, map: map});
                    });
                }
                google.maps.event.addDomListener(window, 'load', initialize);


                var x = data;
                var geocoder = new google.maps.Geocoder();
                geocoder.geocode({address: x}, function (results, status) {
                    if (status == google.maps.GeocoderStatus.OK) {

                        var geocoder = new google.maps.Geocoder();
                        var latLng = new google.maps.LatLng(results[0].geometry.location.lat(), results[0].geometry.location.lng());

                        var map = new google.maps.Map(document.getElementById('mapCanvas'), {
                            zoom: 13,
                            center: latLng,
                            mapTypeId: google.maps.MapTypeId.ROADMAP
                        });
                        var marker = new google.maps.Marker({
                            position: latLng,
                            title: data,
                            map: map,
                            draggable: true
                        });

                        // Update current position info.
                        updateMarkerPosition(latLng);
                        geocodePosition(latLng);

                        // Add dragging event listeners.
                        google.maps.event.addListener(marker, 'dragstart', function () {
                            updateMarkerAddress('Dragging...');
                        });

                        google.maps.event.addListener(marker, 'drag', function () {
                            updateMarkerStatus('Dragging...');
                            updateMarkerPosition(marker.getPosition());
                        });

                        google.maps.event.addListener(marker, 'dragend', function () {
                            updateMarkerStatus('Drag ended');
                            geocodePosition(marker.getPosition());
                        });

                        function geocodePosition(pos) {
                            geocoder.geocode({
                                latLng: pos
                            }, function (responses) {
                                if (responses && responses.length > 0) {
                                    updateMarkerAddress(responses[0].formatted_address);
                                } else {
                                    updateMarkerAddress('Cannot determine address at this location.');
                                }
                            });
                        }

                        function updateMarkerStatus(str) {
                            document.getElementById('markerStatus').innerHTML = str;
                        }

                        function updateMarkerPosition(latLng) {
                            document.getElementById('info').innerHTML = [
                                latLng.lat(),
                                latLng.lng()
                            ].join(', ');

                            document.getElementById('lat').value = latLng.lat();
                            document.getElementById('lng').value = latLng.lng();
                        }

                        function updateMarkerAddress(str) {
                            document.getElementById('address').innerHTML = str;
                        }

                        // Onload handler to fire off the app.
                        google.maps.event.addDomListener(window, 'load', initialize);

                    } else {
                        alert("Something got wrong " + status);
                    }
                });
            });

        }

    });

</script> 

