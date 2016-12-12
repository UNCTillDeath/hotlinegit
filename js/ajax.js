$(document).ready(function () {



    update(); //update database
    fillcameralist(); //fill the rooms for cameras

    var intervalID = setInterval(update, 5000);

    /*
    Bindings:

    Checkbutton: Begins the room check application

    Close: button to close room check without submitting

    Buildingname: Will retrieve the rooms of a given building
      Input is taken from the input text from the camera card
      output is given as a json datalist under the room number text field

    Sub: Submit ticket update based off of the inputs in ticket card

    Rcbutton: Actually submits the roomcheck to the database


    */
    $("#search").bind("click", function () {
        $("#cameraModal").show();
        //    $("#rchead").text($("#rc").text());
    });



    $("#checkbutton").bind("click", function () {
        $("#rcModal").show();
        $("#rchead").text($("#rc").text() + " Room Check");
    });

    $(".close").bind("click", function () {
        $(".modal").hide();
    });

    $("#logo").bind("click", function(){
        $("#videogame").show();
        $("#defaultCanvas0").show();
    });

    $("#sign").bind("click", function(){
        var user = $("#user").val();
        $("#loginpage").hide();
    });

    $(".fa-refresh").bind("click", function () {
        update();
    });

    $("#buildingname").bind("focusout", function () {
        var building_name = $("#buildingname").val();
        getBuildingRooms(building_name);
    });

    $("#sub").bind("click", function () {
        var ticket_info = $("#room").text() + ", " + $("#worklogin").val() + "," + $("#status").text();
        sendTicket(ticket_info);
    });

    $("#rcbutton").bind("click", function () {
        $("#rcModal").hide();
        var roomcheck_data = $("#rc").text() + "," + $("#issuebutton").text() + "," + $("#rcwork").val();
        submitRoomCheck(roomcheck_data);
    });
});
/*
    Text movement helper functions. Just changes the button text to clicked
    item and resets them on roomcheck or ticket submission.
*/
function move(e) {
    $("#room").text(e);
}

function updatestatus(e) {
    $("#status").text(e);
}

function changefield(e, b) {
    if (b == 2) $("#issuebutton").text(e);
    else $("#rc").text(e);
}

/*
Update function pushes updated database to the website
*/
function update() {
    $.ajax({
        url: 'phpfiles/update.php',
        data: "",
        success: function (data) {
            $('#ticketcard').html(data);
        }
    });

    $.ajax({
        url: 'phpfiles/filldb.php',
        data: "",
        success: function (data) {
            $('#txtHint').html(data);
        }
    });

}

function fillcameralist() {
    $.ajax({
        url: 'phpfiles/cameralist.php',
        data: "",
        success: function (data) {
            $("#roomlist").html(data);
        }
    });
}

function sendTicket(ticket_info) {
    $.ajax({
        url: "phpfiles/send.php",
        type: "POST",
        data: {
            data: ticket_info
        },
        success: function (data) {
            update();
            move("Room");
            updatestatus("Status");
        }
    });
}

function submitRoomCheck(roomcheck_data) {
    $.ajax({
        url: "phpfiles/submitrc.php",
        type: "POST",
        data: {
            data: roomcheck_data
        },
        success: function (data) {
            update();
            changefield("Room", 1);
            changefield("Issue", 2);
        }
    });
}

function getBuildingRooms(building_name) {
    $.ajax({
        url: 'phpfiles/getnumber.php',
        type: "GET",
        data: {
            data: building_name
        },
        success: function (data) {
            $("#numlist").html(data);
        }

    });
}
