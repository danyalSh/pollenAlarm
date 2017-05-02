// Configure our weather widget during jQuery.OnReady
$(function () {

    var isMetric = true;
    var locationUrl = "";
    var currentConditionsUrl = "";
    //$('#pollenTable').hide();

    var language = "en";

    // Contact AccuWeather to get an official key. They key in this
    // example is temporary and should NOT be used it in production.
    var apiKey = "hoArfRosT1215";
    var apiKey2 = "ZLcq2kvJrV91rVQpZTjiRNhwxFfdSPSq";

    var searchCity = function (request, response) {
        locationUrl = "http://apidev.accuweather.com/locations/v1/search?q=" + request.term + "&apikey=hoArfRosT1215";
        $.ajax({
            type: "GET",
            url: locationUrl,
            dataType: "jsonp",
            cache: true,                    // Use cache for better reponse times
            jsonpCallback: "awxCallback",   // Prevent unique callback name for better reponse times
            success: function(data) {
                response($.map(data, function (el) {
                    return {
                        label: el.LocalizedName + ', ' + el.Country.ID,
                        value: el.Key
                    };
                }));
            }
        });
    };

    var awxClearMessages = function() {
        //$("#weatherResults").html("...");
        $("#results").html("...");
        $('#pollenTable').html(" ");
        $('#pollenTable').html("<tr><th>day 1</th><th>day 2</th><th>day 3</th><th>day 4</th><th>day 5</th></tr>");
        //$("#awxWeatherInfo").html("...");
        //$("#awxWeatherUrl").html("...");
    };

    // Searches for a city with the name specified in freeText.
    // freeText can be something like:
    //          new york
    //          new york, ny
    //          paris
    //          paris, france
    // For more info about location API go to http://apidev.accuweather.com/developers/locations
    var awxCityLookUp = function (freeText) {
        awxClearMessages();
        //console.log(freeText);
        locationUrl = "http://apidev.accuweather.com/locations/v1/search?q=" + freeText + "&apikey="+apiKey;
        $.ajax({
            type: "GET",
            url: locationUrl,
            dataType: "jsonp",
            cache: true,                    // Use cache for better reponse times
            jsonpCallback: "awxCallback",   // Prevent unique callback name for better reponse times
            success: function (data) {
                console.log('data: ', data);
                if(data.length > 1){
                    console.log("More than one Match Found!");
                } else {
                    console.log("Single Match Found!");
                    awxCityLookUpFound(data);
                }
                //awxCityLookUpFound(data);
            }
        });
    };

    // Displays what location(s) were found.
    var awxCityLookUpFound = function (data) {
        var msg, locationKey = null;

        if (data.length == 1) {
            locationKey = data[0].Key;
            msg = " " + data[0].LocalizedName + ", " + data[0].Country.ID + " ";
        }
        else if(data.length == 0) {
            msg = "No locations found."
        }
        else {
            locationKey = data[0].Key;
            var msg = " "+data[0].LocalizedName + ", " + data[0].Country.ID + " ";
        }

        console.log(msg);

        $("#location").html(msg);
        if(locationKey != null) {
            awxGetCurrentConditions(locationKey);
        }
            
    };


    var awxGetCurrentConditions = function (locationKey) {
        $('#pollenTable').show();
        url = "http://dataservice.accuweather.com/forecasts/v1/daily/5day/"+ locationKey +"?apikey="+apiKey2+"&language="+language+"&details=true&metric=true";
        $.ajax({
            type: "GET",
            url: url,
            dataType: "jsonp",
            cache: true,
            jsonpCallback: "awxCallback",
            success: function (data) {
                // console.log(data);
                    //pollenData = data.DailyForecasts;
                    window.pollenData = data;
                //    var html = "";
                //     if(data && pollenData.length > 0) {
                //         for(var j = 0; j<pollenData.length; j++){
                //             html += "<td><table>";
                //             var airAndPollen = pollenData[j].AirAndPollen;
                //             for(var k = 0; k<airAndPollen.length; k++ ){
                //                 html += "<tr><td><b>Name:</b> "+airAndPollen[k].Name+", <br /><b>Category:</b> "+airAndPollen[k].Category+", <br /><b>Category Value:</b> "+airAndPollen[k].CategoryValue+" </td></tr>";
                //             }
                //             html += "</table></td>"
                //         }
                //     }
                //     else {
                //         html = "N/A";
                //     }
                // $("#pollenTable").append(html);
            }
        });
    };


    // $("#awxSearchTextBox").keypress(function (e) {
    //     if ((e.which && e.which == 13) || (e.keyCode && e.keyCode == 13)) {
    //         var text = $("#awxSearchTextBox").val();
    //         awxCityLookUp(text);
    //         return false;
    //     } else {
    //         return true;
    //     }
    // });

    $(".awxSearchTextBox").autocomplete({
        source: function (request, response) {
            searchCity(request, response);
        },
        select: function (event, ui) {
            // Prevent value from being put in the input:
            this.value = ui.item.label;
            $('#location').text(ui.item.label);
            var data = awxGetCurrentConditions(ui.item.value);
            setTimeout(function (){
                //console.log(data);
//                $('#headline').text(data.Headline.Text);
            }, 2000);
            event.preventDefault();
        },
        minLength: 4
    });

    $("#awxSearchButton").click(function () {
        var text = $("#awxSearchTextBox").val();
        awxCityLookUp(text);
    });

});
// ]]>