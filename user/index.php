<?php 
session_start();
  if(!isset($_SESSION['Sales_ID']) ){

    header("location:../index.php");
    
  }
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Hino Booking Room HMSI Jatake</title>
        <!-- demo stylesheet -->
    	<link type="text/css" rel="stylesheet" href="media/layout.css" />

	<!-- helper libraries -->
	<script src="js/jquery/jquery-1.9.1.min.js" type="text/javascript"></script>

	<!-- daypilot libraries -->
        <script src="js/daypilot/daypilot-all.min.js" type="text/javascript"></script>

        <link type="text/css" rel="stylesheet" href="icons/style.css" />
        <link href="image/logo2.png" type="image/png" rel="icon">

        <style type="text/css">
            body, input, button, select {
                font-size: 14px;
            }
            
            select {
                padding: 5px;
            }
            
            .toolbar {
                margin: 10px 0px;
            }
            
            .toolbar button {
                padding: 5px 15px;
            }
            
            .icon {
                font-size: 14px;
                text-align: center;
                line-height: 14px;
                vertical-align: middle;

                cursor: pointer;
            }
            
            .toolbar-separator {
                width: 1px;
                height: 28px;
                /*content: '&nbsp;';*/
                display: inline-block;
                box-sizing: border-box;
                background-color: #ccc;
                margin-bottom: -8px;
                margin-left: 15px;
                margin-right: 15px;
            }

            .scheduler_default_rowheader_inner
            {
                border-right: 1px solid #2F4F4F;
            }
            .scheduler_default_rowheadercol2
            {
                background: White;
            }
            .scheduler_default_rowheadercol2 .scheduler_default_rowheader_inner
            {
                top: 2px;
                bottom: 2px;
                left: 2px;
                background-color: transparent;
                border-left: 5px solid #38761d; /* green */
                border-right: 0px none;
            }
            .status_dirty.scheduler_default_rowheadercol2 .scheduler_default_rowheader_inner
            {
                border-left: 5px solid #cc0000; /* red */
            }
            .status_cleanup.scheduler_default_rowheadercol2 .scheduler_default_rowheader_inner
            {
                border-left: 5px solid #e69138; /* orange */
            }
            /* Remove margins and padding from the list, and add a black background color */
ul.topnav {
    list-style-type: none;
    margin: 0;
    padding: 0;
    overflow: hidden;
    background-color: #333;
}

/* Float the list items side by side */
ul.topnav li {float: left;}

/* Style the links inside the list items */
ul.topnav li a {
    display: inline-block;
    color: #f2f2f2;
    text-align: center;
    padding: 14px 16px;
    text-decoration: none;
    transition: 0.3s;
    font-size: 17px;
}

/* Change background color of links on hover */
ul.topnav li a:hover {background-color: #111;}

/* Hide the list item that contains the link that should open and close the topnav on small screens */
ul.topnav li.icon {display: none;}

/* Saat lebar layar kurang dari 680 pixel, sembunyikan semua menu item kecuali item yang pertama yaitu("Home"). Tampilkan juga list item yang berisi link untuk membuka menu yaitu (li.icon) */
@media screen and (max-width:680px) {
  ul.topnav li:not(:first-child) {display: none;}
  ul.topnav li.icon {
    float: right;
    display: inline-block;
  }
}

/* Class dengan nama "responsive" akan ditambahkan oleh JavaScript saat user mengklik icon. Munculnya Class ini akan mendisplay isi list menu 
*/
@media screen and (max-width:680px) {
  ul.topnav.responsive {position: relative;}
  ul.topnav.responsive li.icon {
    position: absolute;
    right: 0;
    top: 0;
  }
  ul.topnav.responsive li {
    float: none;
    display: inline;
  }
  ul.topnav.responsive li a {
    display: block;
    text-align: left;
  }
}
#footer{
    height:50px;
    line-height:50px;
    background:#333;
    color:#fff;
}

.depth {
display: block;
border: 1px solid silver;
background: linear-gradient(#eee, #fff);
transition: all 0.3s ease-out;
padding: 5px;
color: #555;
}
.depth:focus {
outline: none;
background-position: 0 -1.7em;
}

        </style>

    </head>
    <body>  
<ul class="topnav">
  <li><a href="index.php">Booking Room</a></li>
  <li><a href="permintaan.php">Permintaan Booking</a></li>
  <li><a onclick="if(confirm('Apakah Anda Yakin Ingin Logout ?')){ location.href='logout.php' }">Logout</a></li>
  <li class="icon">
    <a href="javascript:void(0);" onclick="myFunction()">☰</a>
  </li>
</ul>
            <div id="">
                <div class="bg-help">
                    <div class="inBox">
                        <img src="logo.png"  width="350px" style="padding-top:5px;">
                        <hr class="hidden" />
                    </div>
                </div>
            </div>
            <div class="shadow"></div>
            <div class="hideSkipLink">
            </div>
            <div class="main">

                <div style="width:220px; float:left;">
                    <div id="nav"></div>
                </div>

                <div style="margin-left: 220px;">

                    <div class="toolbar">
                        
                        <!-- Room filter:
                        <select id="filter">
                            <option value="0">All</option>
                            <option value="1">Single</option>
                            <option value="2">Double</option>
                            <option value="4">Family</option>
                        </select> -->
                        
                        &nbsp;&nbsp;
                        
                        <!-- <button id="add-room">Add Room</button> -->

                        <div class="toolbar-separator"></div>
                        
                        Time range:
                        <select id="timerange">
                            <option value="week">Week</option>
                            <option value="month" selected>Month</option>
                        </select>
                        
                        <div class="toolbar-separator"></div>
                        
                        <label for="autocellwidth"><input type="checkbox" id="autocellwidth">Auto Cell Width</label>

                    </div>

                    <div id="dp"></div>

                </div>

                <script type="text/javascript">
                    var nav = new DayPilot.Navigator("nav");
                    nav.selectMode = "month";
                    nav.showMonths = 3;
                    nav.skipMonths = 3;
                    nav.onTimeRangeSelected = function(args) {
                        loadTimeline(args.start);
                        loadEvents();
                    };
                    nav.init();

                    $("#timerange").change(function() {
                        switch (this.value) {
                            case "week":
                                dp.days = 7;
                                nav.selectMode = "Week";
                                nav.select(nav.selectionDay);
                                break;
                            case "month":
                                dp.days = dp.startDate.daysInMonth();
                                nav.selectMode = "Month";
                                nav.select(nav.selectionDay);
                                break;
                        }
                    });

                    $("#autocellwidth").click(function() {
                        dp.cellWidth = 60;  // reset for "Fixed" mode
                        dp.cellWidthSpec = $(this).is(":checked") ? "Auto" : "Fixed";
                        dp.update();
                    });

                    $("#add-room").click(function(ev) {
                        ev.preventDefault();
                        var modal = new DayPilot.Modal();
                        modal.onClosed = function(args) {
                            loadResources();
                        };
                        modal.showUrl("room_new.php");
                    });
                </script>

                <script>
                    var dp = new DayPilot.Scheduler("dp");

                    dp.allowEventOverlap = false;
                    
                    dp.startDate = DayPilot.Date.today().firstDayOfMonth();
                    dp.days = DayPilot.Date.today().daysInMonth();
                    loadTimeline(DayPilot.Date.today().firstDayOfMonth());
                    

                    // dp.eventDeleteHandling = "Update";
                    
                    dp.scale = "Day";

                    dp.timeHeaders = [
                        { groupBy: "Month", format: "MMMM yyyy" },
                        { groupBy: "Day", format: "d" }
                    ];
                

                    dp.eventHeight = 80;
                    dp.cellWidth = 60;

                    dp.rowHeaderColumns = [
                        {title: "Room", width: 80},
                        // {title: "Capacity", width: 80},
                        // {title: "Status", width: 80}
                    ];

                    dp.separators = [
                        { location: new DayPilot.Date(), color: "red" }
                    ];

                    dp.onBeforeResHeaderRender = function(args) {
                        var beds = function(count) {
                            return count + " bed" + (count >= 1 ? "s" : "");
                        };

                        // args.resource.columns[0].html = beds(args.resource.capacity);
                        // args.resource.columns[0].html = args.resource.status;
                        switch (args.resource.status) {
                            case "Dirty":
                                args.resource.cssClass = "status_dirty";
                                break;
                            case "Cleanup":
                                args.resource.cssClass = "status_cleanup";
                                break;
                        }

                        // args.resource.areas = [{
                        //             top:3,
                        //             right:4,
                        //             height:14,
                        //             width:14,
                        //             action:"JavaScript",
                        //             js: function(r) {
                        //                 var modal = new DayPilot.Modal();
                        //                 modal.onClosed = function(args) {
                        //                     loadResources();
                        //                 };
                        //                 modal.showUrl("room_edit.php?id=" + r.id);
                        //             },
                        //             v:"Hover",
                        //             css:"icon icon-edit",
                        //         }];
                    };

                    // http://api.daypilot.org/daypilot-scheduler-oneventmoved/
                    dp.onEventMoved = function (args) {
                        $.post("backend_move.php",
                        {
                            id: args.e.id(),
                            newStart: args.newStart.toString(),
                            newEnd: args.newEnd.toString(),
                            newResource: args.newResource
                        },
                        function(data) {
                            dp.message(data.message);
                        });
                    };

                    // http://api.daypilot.org/daypilot-scheduler-oneventresized/
                    dp.onEventResized = function (args) {
                        $.post("backend_resize.php",
                        {
                            id: args.e.id(),
                            newStart: args.newStart.toString(),
                            newEnd: args.newEnd.toString()
                        },
                        function() {
                            dp.message("Resized.");
                        });
                    };

                    dp.onEventDeleted = function(args) {
                        $.post("backend_delete.php",
                        {
                            id: args.e.id()
                        },
                        function() {
                            dp.message("Deleted.");
                        });
                    };

                    // event creating
                    // http://api.daypilot.org/daypilot-scheduler-ontimerangeselected/
                    dp.onTimeRangeSelected = function (args) {
                        //var name = prompt("New event name:", "Event");
                        //if (!name) return;

                        var modal = new DayPilot.Modal();
                        modal.closed = function() {
                            dp.clearSelection();

                            // reload all events
                            var data = this.result;
                            if (data && data.result === "OK") {
                                loadEvents();
                            }
                        };
                        modal.showUrl("reservation_new.php?start=" + args.start + "&end=" + args.end + "&resource=" + args.resource);

                    };

                    dp.onEventClick = function(args) {
                        var modal = new DayPilot.Modal();
                        modal.closed = function() {
                            // reload all events
                            var data = this.result;
                            if (data && data.result === "OK") {
                                loadEvents();
                            }
                        };
                        modal.showUrl("reservation_edit.php?id=" + args.e.id());
                    };

                    dp.onBeforeEventRender = function(args) {
                        var start = new DayPilot.Date(args.e.start);
                        var end = new DayPilot.Date(args.e.end);

                        var today = DayPilot.Date.today();
                        var now = new DayPilot.Date();

                        args.e.html = args.e.text + " (" + start.toString("d/M/yyyy") + " - " + end.toString("d/M/yyyy") + ")";

                        switch (args.e.status) {
                            case "New":
                                var in2days = today.addDays(1);

                                if (start < in2days) {
                                    args.e.barColor = '#FF0000';
                                    args.e.toolTip = 'Menunggu (not confirmed in time)';
                                }
                                else {
                                    args.e.barColor = '#FF0000';
                                    args.e.toolTip = 'New';
                                }
                                break;
                            case "Confirmed":
                                var arrivalDeadline = today.addHours(24);

                                if (start < today || (start.getDatePart() === today.getDatePart() && now > arrivalDeadline)) { // must arrive before 6 pm
                                    args.e.barColor = "#008000";  // red
                                    args.e.toolTip = 'Confirmed';
                                }
                                else {
                                    args.e.barColor = "#008000";
                                    args.e.toolTip = "Confirmed";
                                }
                                break;
                            case 'Arrived': // arrived
                                var checkoutDeadline = today.addHours(24);

                                if (end < today || (end.getDatePart() === today.getDatePart() && now > checkoutDeadline)) { // must checkout before 10 am
                                    args.e.barColor = "#FF0000";  // red
                                    args.e.toolTip = "Late checkout";
                                }
                                else
                                {
                                    args.e.barColor = "#FF0000";  // blue
                                    args.e.toolTip = "Arrived";
                                }
                                break;
                            case 'CheckedOut': // checked out
                                args.e.barColor = "gray";
                                args.e.toolTip = "Checked out";
                                break;
                            default:
                                args.e.toolTip = "Unexpected state";
                                break;
                        }

                        args.e.html = "<div>" + args.e.html + "<br /><span style='color:gray'>" + args.e.toolTip + "</span></div>";

                        var paid = args.e.paid;
                        var paidColor = "#aaaaaa";

                        // args.e.areas = [
                        //     { bottom: 10, right: 4, html: "<div style='color:" + paidColor + "; font-size: 8pt;'>Paid: " + paid + "%</div>", v: "Visible"},
                        //     { left: 4, bottom: 8, right: 4, height: 2, html: "<div style='background-color:" + paidColor + "; height: 100%; width:" + paid + "%'></div>", v: "Visible" }
                        // ];

                    };


                    dp.init();

                    loadResources();
                    loadEvents();

                    function loadTimeline(date) {
                        dp.scale = "Manual";
                        dp.timeline = [];
                        var start = date.getDatePart().addHours(24);

                        for (var i = 0; i <= dp.days; i++) {
                            dp.timeline.push({start: start.addDays(i), end: start.addDays(i+1)});
                        }
                        dp.update();
                    }

                    function loadEvents() {
                        var start = dp.visibleStart();
                        var end = dp.visibleEnd();

                        $.post("backend_events.php",
                            {
                                start: start.toString(),
                                end: end.toString()
                            },
                            function(data) {
                                dp.events.list = data;
                                dp.update();
                            }
                        );
                    }

                    function loadResources() {
                        $.post("backend_rooms.php",
                        { capacity: $("#filter").val() },
                        function(data) {
                            dp.resources = data;
                            dp.update();
                        });
                    }

                    $(document).ready(function() {
                        $("#filter").change(function() {
                            loadResources();
                        });
                    });

                </script>
<script>
/* Toggle between adding and removing the "responsive" class to topnav when the user clicks on the icon */
function myFunction() {
    document.getElementsByClassName("topnav")[0].classList.toggle("responsive");
}
</script>


            </div>
            <div class="clear">
            </div>
            <div id="footer">
        <center><img src="logo.png" width="150px" style="padding-top:12px;"></center>
    </div>
    </body>
</html>
