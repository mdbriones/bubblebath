$(document).ready(function(){
    $("#carSize").on('change', function(){
        var size = document.getElementById("carSize").value;

        switch(size){
            case "s":
                // $("#div_basics").show();
                // $("#div_autodetailing").show();
                resetChoices();

                $("#lbl_Bodywash").html("80.00");
                $("#lbl_HandWax").html("100.00");
                $("#lbl_EngineWash").html("250.00");
                $("#lbl_Armor").html("60.00");
                $("#lbl_Orbital").html("250.00");
                $("#lbl_Underwash").html("100.00");
                $("#lbl_AsphaltRem").html("150.00");
                $("#lbl_SeatCover").html("80.00");
                $("#lbl_Leather").html("80.00");

                $("#lbl_InteriorDetail").html("1800.00");
                $("#lbl_Exterior").html("2500.00");
                $("#lbl_Glass").html("1000.00");
                $("#lbl_Engine").html("1250.00");
                $("#lbl_Full").html("6550.00");

                break;

            case "md":
                // $("#div_basics").show();
                // $("#div_autodetailing").show();

                resetChoices();

                $("#lbl_Bodywash").html("100.00");
                $("#lbl_HandWax").html("120.00");
                $("#lbl_EngineWash").html("350.00");
                $("#lbl_Armor").html("80.00");
                $("#lbl_Orbital").html("350.00");
                $("#lbl_Underwash").html("120.00");
                $("#lbl_AsphaltRem").html("150.00");
                $("#lbl_SeatCover").html("100.00");
                $("#lbl_Leather").html("100.00");

                $("#lbl_InteriorDetail").html("2200.00");
                $("#lbl_Exterior").html("3000.00");
                $("#lbl_Glass").html("1500.00");
                $("#lbl_Engine").html("1500.00");
                $("#lbl_Full").html("7380.00");

                break;

            case "lg":
                // $("#div_basics").show();
                // $("#div_autodetailing").show();

                resetChoices();

                $("#lbl_Bodywash").html("120.00");
                $("#lbl_HandWax").html("140.00");
                $("#lbl_EngineWash").html("450.00");
                $("#lbl_Armor").html("100.00");
                $("#lbl_Orbital").html("450.00");
                $("#lbl_Underwash").html("140.00");
                $("#lbl_AsphaltRem").html("150.00");
                $("#lbl_SeatCover").html("120.00");
                $("#lbl_Leather").html("120.00");

                $("#lbl_InteriorDetail").html("2500.00");
                $("#lbl_Exterior").html("3500.00");
                $("#lbl_Glass").html("2000.00");
                $("#lbl_Engine").html("1750.00");
                $("#lbl_Full").html("9750.00");

                break;

            default:
                // $("#div_basics").hide();
                // $("#div_autodetailing").hide();
                
                resetChoices();

                $("#lbl_Bodywash").html("");
                $("#lbl_HandWax").html("");
                $("#lbl_EngineWash").html("");
                $("#lbl_Armor").html("");
                $("#lbl_Orbital").html("");
                $("#lbl_Underwash").html("");
                $("#lbl_AsphaltRem").html("");
                $("#lbl_SeatCover").html("");
                $("#lbl_Leather").html("");

                $("#lbl_InteriorDetail").html("");
                $("#lbl_Exterior").html("");
                $("#lbl_Glass").html("");
                $("#lbl_Engine").html("");
                $("#lbl_Full").html("");

                $("#txtBodyWash").attr("value","0");
                $("#txtHandWax").attr("value","0");
                $("#txtEngineWash").attr("value","0");
                $("#txtArmor").attr("value","0");
                $("#txtOrbital").attr("value","0");
                $("#txtUnderWash").attr("value","0");
                $("#txtAsphaltRem").attr("value","0");
                $("#txtSeatCover").attr("value","0");
                $("#txtLeather").attr("value","0");

                $("#txtInterior").attr("value","0");
                $("#txtExterior").attr("value","0");
                $("#txtGlassDetail").attr("value","0");
                $("#txtEngineDetail").attr("value","0");
                $("#txtFull").attr("value","0");

                break;

        }
    });

    // onchange of textboxes
    // ================================================
    // services
    $("#chkBodyWash").on('change', function(e){
        if($(this).prop("checked") == true){
            // alert("Checkbox is checked.");
            $("#txtBodyWash").attr("disabled", false);
            var subAmount = $("#lbl_Bodywash").text();

            $("#txtBodyWash").css("background-color", "#aae57c");
            $("#txtBodyWash").css("color", "#218838");
            $("#txtBodyWash").attr("value", subAmount);

            computeTotal();
        }
        else if($(this).prop("checked") == false){
            // alert("Checkbox is unchecked.");
            $("#txtBodyWash").attr("disabled", true);

            $("#txtBodyWash").css("background-color", "#E9ECEF");
            $("#txtBodyWash").css("color", "#6C758E");
            $("#txtBodyWash").attr("value", 0);

            computeTotal();
        }
    });

    $("#chkHandWax").on('change', function(e){
        if($(this).prop("checked") == true){
            // alert("Checkbox is checked.");
            $("#txtHandWax").attr("disabled", false);
            var subAmount = $("#lbl_HandWax").text();

            $("#txtHandWax").css("background-color", "#aae57c");
            $("#txtHandWax").css("color", "#218838");
            $("#txtHandWax").attr("value", subAmount);

            computeTotal();

        }
        else if($(this).prop("checked") == false){
            // alert("Checkbox is unchecked.");
            $("#txtHandWax").attr("disabled", true);

            $("#txtHandWax").css("background-color", "#E9ECEF");
            $("#txtHandWax").css("color", "#6C758E");
            $("#txtHandWax").attr("value", 0);

            computeTotal();
        }
    });

    $("#chkEngineWash").on('change', function(e){
        if($(this).prop("checked") == true){
            // alert("Checkbox is checked.");
            $("#txtEngineWash").attr("disabled", false);
            var subAmount = $("#lbl_EngineWash").text();

            $("#txtEngineWash").css("background-color", "#aae57c");
            $("#txtEngineWash").css("color", "#218838");
            $("#txtEngineWash").attr("value", subAmount);

            computeTotal();

        }
        else if($(this).prop("checked") == false){
            // alert("Checkbox is unchecked.");
            $("#txtEngineWash").attr("disabled", true);

            $("#txtEngineWash").css("background-color", "#E9ECEF");
            $("#txtEngineWash").css("color", "#6C758E");
            $("#txtEngineWash").attr("value", 0);

            computeTotal();
        }
    });

    $("#chkArmor").on('change', function(e){
        if($(this).prop("checked") == true){
            // alert("Checkbox is checked.");
            $("#txtArmor").attr("disabled", false);
            var subAmount = $("#lbl_Armor").text();

            $("#txtArmor").css("background-color", "#aae57c");
            $("#txtArmor").css("color", "#218838");
            $("#txtArmor").attr("value", subAmount);

            computeTotal();

        }
        else if($(this).prop("checked") == false){
            // alert("Checkbox is unchecked.");
            $("#txtArmor").attr("disabled", true);

            $("#txtArmor").css("background-color", "#E9ECEF");
            $("#txtArmor").css("color", "#6C758E");
            $("#txtArmor").attr("value", 0);

            computeTotal();
        }
    });

    $("#chkOrbital").on('change', function(e){
        if($(this).prop("checked") == true){
            // alert("Checkbox is checked.");
            $("#txtOrbital").attr("disabled", false);
            var subAmount = $("#lbl_Orbital").text();

            $("#txtOrbital").css("background-color", "#aae57c");
            $("#txtOrbital").css("color", "#218838");
            $("#txtOrbital").attr("value", subAmount);

            computeTotal();

        }
        else if($(this).prop("checked") == false){
            // alert("Checkbox is unchecked.");
            $("#txtOrbital").attr("disabled", true);

            $("#txtOrbital").css("background-color", "#E9ECEF");
            $("#txtOrbital").css("color", "#6C758E");
            $("#txtOrbital").attr("value", 0);

            computeTotal();
        }
    });

    $("#chkUnderwash").on('change', function(e){
        if($(this).prop("checked") == true){
            // alert("Checkbox is checked.");
            $("#txtUnderWash").attr("disabled", false);
            var subAmount = $("#lbl_Underwash").text();

            $("#txtUnderWash").css("background-color", "#aae57c");
            $("#txtUnderWash").css("color", "#218838");
            $("#txtUnderWash").attr("value", subAmount);

            computeTotal();

        }
        else if($(this).prop("checked") == false){
            // alert("Checkbox is unchecked.");
            $("#txtUnderWash").attr("disabled", true);

            $("#txtUnderWash").css("background-color", "#E9ECEF");
            $("#txtUnderWash").css("color", "#6C758E");
            $("#txtUnderWash").attr("value", 0);

            computeTotal();
        }
    });

    $("#chkAsphaltRem").on('change', function(e){
        if($(this).prop("checked") == true){
            // alert("Checkbox is checked.");
            $("#txtAsphaltRem").attr("disabled", false);
            var subAmount = $("#lbl_AsphaltRem").text();

            $("#txtAsphaltRem").css("background-color", "#aae57c");
            $("#txtAsphaltRem").css("color", "#218838");
            $("#txtAsphaltRem").attr("value", subAmount);

            computeTotal();

        }
        else if($(this).prop("checked") == false){
            // alert("Checkbox is unchecked.");
            $("#txtAsphaltRem").attr("disabled", true);

            $("#txtAsphaltRem").css("background-color", "#E9ECEF");
            $("#txtAsphaltRem").css("color", "#6C758E");
            $("#txtAsphaltRem").attr("value", 0);

            computeTotal();
        }
    });

    $("#chkSeatCover").on('change', function(e){
        if($(this).prop("checked") == true){
            // alert("Checkbox is checked.");
            $("#txtSeatCover").attr("disabled", false);
            var subAmount = $("#lbl_SeatCover").text();

            $("#txtSeatCover").css("background-color", "#aae57c");
            $("#txtSeatCover").css("color", "#218838");
            $("#txtSeatCover").attr("value", subAmount);

            computeTotal();

        }
        else if($(this).prop("checked") == false){
            // alert("Checkbox is unchecked.");
            $("#txtSeatCover").attr("disabled", true);

            $("#txtSeatCover").css("background-color", "#E9ECEF");
            $("#txtSeatCover").css("color", "#6C758E");
            $("#txtSeatCover").attr("value", 0);

            computeTotal();
        }
    });

    $("#chkLeather").on('change', function(e){
        if($(this).prop("checked") == true){
            // alert("Checkbox is checked.");
            $("#txtLeather").attr("disabled", false);
            var subAmount = $("#lbl_Leather").text();

            $("#txtLeather").css("background-color", "#aae57c");
            $("#txtLeather").css("color", "#218838");
            $("#txtLeather").attr("value", subAmount);

            computeTotal();

        }
        else if($(this).prop("checked") == false){
            // alert("Checkbox is unchecked.");
            $("#txtLeather").attr("disabled", true);

            $("#txtLeather").css("background-color", "#E9ECEF");
            $("#txtLeather").css("color", "#6C758E");
            $("#txtLeather").attr("value", 0);

            computeTotal();
        }
    });

    // ==============================================
    // autodetailing
    $("#chkInteriorDetail").on('change', function(e){
        if($(this).prop("checked") == true){
            // alert("Checkbox is checked.");
            $("#txtInterior").attr("disabled", false);
            var subAmount = $("#lbl_InteriorDetail").text();

            $("#txtInterior").css("background-color", "#aae57c");
            $("#txtInterior").css("color", "#218838");
            $("#txtInterior").attr("value", subAmount);

            computeTotal();

        }
        else if($(this).prop("checked") == false){
            // alert("Checkbox is unchecked.");
            $("#txtInterior").attr("disabled", true);

            $("#txtInterior").css("background-color", "#E9ECEF");
            $("#txtInterior").css("color", "#6C758E");
            $("#txtInterior").attr("value", 0);

            computeTotal();
        }
    });
    $("#chkExterior").on('change', function(e){
        if($(this).prop("checked") == true){
            // alert("Checkbox is checked.");
            $("#txtExterior").attr("disabled", false);
            var subAmount = $("#lbl_Exterior").text();

            $("#txtExterior").css("background-color", "#aae57c");
            $("#txtExterior").css("color", "#218838");
            $("#txtExterior").attr("value", subAmount);

            computeTotal();

        }
        else if($(this).prop("checked") == false){
            // alert("Checkbox is unchecked.");
            $("#txtExterior").attr("disabled", true);

            $("#txtExterior").css("background-color", "#E9ECEF");
            $("#txtExterior").css("color", "#6C758E");
            $("#txtExterior").attr("value", 0);

            computeTotal();
        }
    });
    $("#chkGlass").on('change', function(e){
        if($(this).prop("checked") == true){
            // alert("Checkbox is checked.");
            $("#txtGlassDetail").attr("disabled", false);
            var subAmount = $("#lbl_Glass").text();

            $("#txtGlassDetail").css("background-color", "#aae57c");
            $("#txtGlassDetail").css("color", "#218838");
            $("#txtGlassDetail").attr("value", subAmount);

            computeTotal();

        }
        else if($(this).prop("checked") == false){
            // alert("Checkbox is unchecked.");
            $("#txtGlassDetail").attr("disabled", true);

            $("#txtGlassDetail").css("background-color", "#E9ECEF");
            $("#txtGlassDetail").css("color", "#6C758E");
            $("#txtGlassDetail").attr("value", 0);

            computeTotal();
        }
    });
    $("#chkEngine").on('change', function(e){
        if($(this).prop("checked") == true){
            // alert("Checkbox is checked.");
            $("#txtEngineDetail").attr("disabled", false);
            var subAmount = $("#lbl_Engine").text();

            $("#txtEngineDetail").css("background-color", "#aae57c");
            $("#txtEngineDetail").css("color", "#218838");
            $("#txtEngineDetail").attr("value", subAmount);

            computeTotal();

        }
        else if($(this).prop("checked") == false){
            // alert("Checkbox is unchecked.");
            $("#txtEngineDetail").attr("disabled", true);

            $("#txtEngineDetail").css("background-color", "#E9ECEF");
            $("#txtEngineDetail").css("color", "#6C758E");
            $("#txtEngineDetail").attr("value", 0);

            computeTotal();
        }
    });
    $("#chkFull").on('change', function(e){
        if($(this).prop("checked") == true){
            // alert("Checkbox is checked.");
            $("#txtFull").attr("disabled", false);
            var subAmount = $("#lbl_Full").text();

            $("#txtFull").css("background-color", "#aae57c");
            $("#txtFull").css("color", "#218838");
            $("#txtFull").attr("value", subAmount);

            computeTotal();

        }
        else if($(this).prop("checked") == false){
            // alert("Checkbox is unchecked.");
            $("#txtFull").attr("disabled", true);

            $("#txtFull").css("background-color", "#E9ECEF");
            $("#txtFull").css("color", "#6C758E");
            $("#txtFull").attr("value", 0);

            computeTotal();
        }
    });

    function resetChoices(){
        $("#txtBodyWash").attr("value","0");
        $("#txtHandWax").attr("value","0");
        $("#txtEngineWash").attr("value","0");
        $("#txtArmor").attr("value","0");
        $("#txtOrbital").attr("value","0");
        $("#txtUnderWash").attr("value","0");
        $("#txtAsphaltRem").attr("value","0");
        $("#txtSeatCover").attr("value","0");
        $("#txtLeather").attr("value","0");

        $("#txtInterior").attr("value","0");
        $("#txtExterior").attr("value","0");
        $("#txtGlassDetail").attr("value","0");
        $("#txtEngineDetail").attr("value","0");
        $("#txtFull").attr("value","0");

        computeTotal();

        $('input:checkbox').prop('checked', false);
        $("#txtFull").attr("disabled", true);

        $('.serv input:text').css("background-color", "#E9ECEF");
        $('.serv input:text').css("color", "#6C758E");
        $('.serv input:text').attr("value", 0);
    }

    // compute total amount
    function computeTotal(){
        let bodywash = parseFloat(document.getElementById("txtBodyWash").value);
        let handwax = parseFloat(document.getElementById("txtHandWax").value);
        let enginewash = parseFloat(document.getElementById("txtEngineWash").value);
        let armor = parseFloat(document.getElementById("txtArmor").value);
        let orbital = parseFloat(document.getElementById("txtOrbital").value);
        let underwash = parseFloat(document.getElementById("txtUnderWash").value);
        let asphalt = parseFloat(document.getElementById("txtAsphaltRem").value);
        let seatcover = parseFloat(document.getElementById("txtSeatCover").value);
        let leather = parseFloat(document.getElementById("txtLeather").value);

        let interior = parseFloat(document.getElementById("txtInterior").value);
        let exterior = parseFloat(document.getElementById("txtExterior").value);
        let glass = parseFloat(document.getElementById("txtGlassDetail").value);
        let engineDetail = parseFloat(document.getElementById("txtEngineDetail").value);
        let full = parseFloat(document.getElementById("txtFull").value);

        let totalAmount = bodywash + handwax + enginewash + armor + orbital + underwash + asphalt + seatcover + leather + interior + exterior + glass + engineDetail + full;

        // alert(totalAmount);
        $("#totalAmount").html(totalAmount.toLocaleString("en"));
    }


    $("#btnSubmit").on('click', function(e){
        let conf = confirm("Press OK to continue.");
        var platenumber = document.getElementById("platenumber").value;

        if(conf == true){
            if(platenumber != ""){
                var name = document.getElementById("cname").value;
                var model = document.getElementById("model").value;
                var serviceDate = document.getElementById("service_date").value;
                var email = document.getElementById("email").value;

                var _BodyWash = document.getElementById('txtBodyWash').value;
                var _HandWax = document.getElementById('txtHandWax').value;
                var _EngineWash = document.getElementById('txtEngineWash').value;
                var _Armor = document.getElementById('txtArmor').value;
                var _Orbital = document.getElementById('txtOrbital').value;
                var _UnderWash = document.getElementById('txtUnderWash').value;
                var _AsphaltRem = document.getElementById('txtAsphaltRem').value;
                var _SeatCover = document.getElementById('txtSeatCover').value;
                var _Leather = document.getElementById('txtLeather').value;
                var _Interior = document.getElementById('txtInterior').value;
                var _Exterior = document.getElementById('txtExterior').value;
                var _GlassDetail = document.getElementById('txtGlassDetail').value;
                var _EngineDetail = document.getElementById('txtEngineDetail').value;
                var _Full = document.getElementById('txtFull').value;
                
                var payment_method = document.getElementById("payment_method").value;
                
                var group_shift = document.getElementById("group_shift").value;

                $.ajax({
                    type: "post",
                    url: "_POST/customerService_insert.php",
                    data: {"name": name,
                            "model": model,
                            "email": email,
                            "platenumber": platenumber,
                            "serviceDate": serviceDate,
                            "_BodyWash": _BodyWash,
                            "_HandWax": _HandWax,
                            "_EngineWash": _EngineWash,
                            "_Armor": _Armor,
                            "_Orbital": _Orbital,
                            "_UnderWash": _UnderWash,
                            "_AsphaltRem": _AsphaltRem,
                            "_SeatCover": _SeatCover,
                            "_Leather": _Leather,
                            "_Interior": _Interior,
                            "_Exterior": _Exterior,
                            "_GlassDetail": _GlassDetail,
                            "_EngineDetail": _EngineDetail,
                            "_Full": _Full,
                            "_payment_method": payment_method,
                            "group_shift": group_shift},
                    success: function(data){
                        alert(data);
                        setTimeout(function(){
                            window.location.href = "index.php";
                        },500);
                    }
                });
            }else{
                alert("Please provide the Plate Number");
            }
        }
    });

    

});