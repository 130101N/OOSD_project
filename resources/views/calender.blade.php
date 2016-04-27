@extends('master')

@section('content')
	<h2>This is our calender page</h2>
	<section class="content">
          <div class="row">
            <div class="col-md-3">
              <div class="box box-solid">
                <div class="box-header with-border">
                  <h4 class="box-title">Draggable Events</h4>
                </div>
                <div class="box-body">
                  <!-- the events -->
                  <div id="external-events">
                    <div class="external-event bg-green">Lunch</div>
                    <div class="external-event bg-yellow">Go home</div>
                    <div class="external-event bg-aqua">Do homework</div>
                    <div class="external-event bg-light-blue">Work on UI design</div>
                    <div class="external-event bg-red">Sleep tight</div>
                    <div class="checkbox">
                      <label for="drop-remove">
                        <input type="checkbox" id="drop-remove" />
                        remove after drop
                      </label>
                    </div>
                  </div>
                </div><!-- /.box-body -->
              </div><!-- /. box -->
              <div class="box box-solid">
                <div class="box-header with-border">
                  <h3 class="box-title">Create Event</h3>
                </div>
                <div class="box-body">
                  <div class="btn-group" style="width: 100%; margin-bottom: 10px;">
                    <!--<button type="button" id="color-chooser-btn" class="btn btn-info btn-block dropdown-toggle" data-toggle="dropdown">Color <span class="caret"></span></button>-->
                    <ul class="fc-color-picker" id="color-chooser">
                      <li><a class="text-aqua" href="#"><i class="fa fa-square"></i></a></li>
                      <li><a class="text-blue" href="#"><i class="fa fa-square"></i></a></li>
                      <li><a class="text-light-blue" href="#"><i class="fa fa-square"></i></a></li>
                      <li><a class="text-teal" href="#"><i class="fa fa-square"></i></a></li>
                      <li><a class="text-yellow" href="#"><i class="fa fa-square"></i></a></li>
                      <li><a class="text-orange" href="#"><i class="fa fa-square"></i></a></li>
                      <li><a class="text-green" href="#"><i class="fa fa-square"></i></a></li>
                      <li><a class="text-lime" href="#"><i class="fa fa-square"></i></a></li>
                      <li><a class="text-red" href="#"><i class="fa fa-square"></i></a></li>
                      <li><a class="text-purple" href="#"><i class="fa fa-square"></i></a></li>
                      <li><a class="text-fuchsia" href="#"><i class="fa fa-square"></i></a></li>
                      <li><a class="text-muted" href="#"><i class="fa fa-square"></i></a></li>
                      <li><a class="text-navy" href="#"><i class="fa fa-square"></i></a></li>
                    </ul>
                  </div><!-- /btn-group -->
                  <div class="input-group">
                    <input id="new-event" type="text" class="form-control" placeholder="Event Title">
                    <div class="input-group-btn">
                      <button id="add-new-event" type="button" class="btn btn-primary btn-flat">Add</button>
                    </div><!-- /btn-group -->
                  </div><!-- /input-group -->
                </div>
              </div>
            </div><!-- /.col -->
            <div class="col-md-9">
              <div class="box box-primary">
                <div class="box-body no-padding">
                  <!-- THE CALENDAR -->
                  <div id="calendar"></div>
                </div><!-- /.box-body -->
              </div><!-- /. box -->
            </div><!-- /.col -->
          </div><!-- /.row -->
        </section><!-- /.content -->







<div class="container">
	<!-- Main row -->
          <div class="row">
            <!-- Left col -->
            <div class="col-md-8">
              <!-- MAP & BOX PANE -->
              <div class="box box-success">
                <div class="box-header with-border">
                  <h3 class="box-title">Visitors Report</h3>
                  <div class="box-tools pull-right">
                    <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                    <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                  </div>
                </div><!-- /.box-header -->
                <div class="box-body no-padding">
                  <div class="row">
                    <div class="col-md-9 col-sm-8">
                      <div class="pad">
                        <!-- Map will be created here -->
                        <div id="world-map-markers" style="height: 325px;"></div>
                      </div>
                    </div><!-- /.col -->
                    <div class="col-md-3 col-sm-4">
                      <div class="pad box-pane-right bg-green" style="min-height: 280px">
                        <div class="description-block margin-bottom">
                          <div class="sparkbar pad" data-color="#fff">90,70,90,70,75,80,70</div>
                          <h5 class="description-header">8390</h5>
                          <span class="description-text">Visits</span>
                        </div><!-- /.description-block -->
                        <div class="description-block margin-bottom">
                          <div class="sparkbar pad" data-color="#fff">90,50,90,70,61,83,63</div>
                          <h5 class="description-header">30%</h5>
                          <span class="description-text">Referrals</span>
                        </div><!-- /.description-block -->
                        <div class="description-block">
                          <div class="sparkbar pad" data-color="#fff">90,50,90,70,61,83,63</div>
                          <h5 class="description-header">70%</h5>
                          <span class="description-text">Organic</span>
                        </div><!-- /.description-block -->
                      </div>
                    </div><!-- /.col -->
                  </div><!-- /.row -->
                </div><!-- /.box-body -->
                <div class="col-md-6">
                  <!-- USERS LIST -->
                  <div class="box box-danger">
                    <div class="box-header with-border">
                      <h3 class="box-title">Latest Members</h3>
                      <div class="box-tools pull-right">
                        <span class="label label-danger">8 New Members</span>
                        <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                        <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                      </div>
                    </div><!-- /.box-header -->
                    <div class="box-body no-padding">
                      <ul class="users-list clearfix">
                        <li>
                          <img src='img/employee/Charuni Kaushalya.jpg' alt="User Image" />
                          <a class="users-list-name" href="#">Alexander Pierce</a>
                          <span class="users-list-date">Today</span>
                        </li>
                        <li>
                          <img src="dist/img/user8-128x128.jpg" alt="User Image" />
                          <a class="users-list-name" href="#">Norman</a>
                          <span class="users-list-date">Yesterday</span>
                        </li>
                        <li>
                          <img src="dist/img/user7-128x128.jpg" alt="User Image" />
                          <a class="users-list-name" href="#">Jane</a>
                          <span class="users-list-date">12 Jan</span>
                        </li>
                        <li>
                          <img src="dist/img/user6-128x128.jpg" alt="User Image" />
                          <a class="users-list-name" href="#">John</a>
                          <span class="users-list-date">12 Jan</span>
                        </li>
                        <li>
                          <img src="dist/img/user2-160x160.jpg" alt="User Image" />
                          <a class="users-list-name" href="#">Alexander</a>
                          <span class="users-list-date">13 Jan</span>
                        </li>
                        <li>
                          <img src="dist/img/user5-128x128.jpg" alt="User Image" />
                          <a class="users-list-name" href="#">Sarah</a>
                          <span class="users-list-date">14 Jan</span>
                        </li>
                        <li>
                          <img src="dist/img/user4-128x128.jpg" alt="User Image" />
                          <a class="users-list-name" href="#">Nora</a>
                          <span class="users-list-date">15 Jan</span>
                        </li>
                        <li>
                          <img src="dist/img/user3-128x128.jpg" alt="User Image" />
                          <a class="users-list-name" href="#">Nadia</a>
                          <span class="users-list-date">15 Jan</span>
                        </li>
                      </ul><!-- /.users-list -->
                    </div><!-- /.box-body -->
                    <div class="box-footer text-center">
                      <a href="javascript::" class="uppercase">View All Users</a>
                    </div><!-- /.box-footer -->
                  </div><!--/.box -->
                </div><!-- /.col -->
                <div class="col-md-6">
                	<div class="info-box bg-yellow">
                <span class="info-box-icon"><i class="ion ion-ios-pricetag-outline"></i></span>
                <div class="info-box-content">
                  <span class="info-box-text">Inventory</span>
                  <span class="info-box-number">5,200</span>
                  <div class="progress">
                    <div class="progress-bar" style="width: 50%"></div>
                  </div>
                  <span class="progress-description">
                    50% Increase in 30 Days
                  </span>
                </div><!-- /.info-box-content -->
              </div><!-- /.info-box -->
              <div class="info-box bg-green">
                <span class="info-box-icon"><i class="ion ion-ios-heart-outline"></i></span>
                <div class="info-box-content">
                  <span class="info-box-text">Mentions</span>
                  <span class="info-box-number">92,050</span>
                  <div class="progress">
                    <div class="progress-bar" style="width: 20%"></div>
                  </div>
                  <span class="progress-description">
                    20% Increase in 30 Days
                  </span>
                </div><!-- /.info-box-content -->
              </div><!-- /.info-box -->
              <div class="info-box bg-red">
                <span class="info-box-icon"><i class="ion ion-ios-cloud-download-outline"></i></span>
                <div class="info-box-content">
                  <span class="info-box-text">Downloads</span>
                  <span class="info-box-number">114,381</span>
                  <div class="progress">
                    <div class="progress-bar" style="width: 70%"></div>
                  </div>
                  <span class="progress-description">
                    70% Increase in 30 Days
                  </span>
                </div><!-- /.info-box-content -->
              </div><!-- /.info-box -->
              <div class="info-box bg-aqua">
                <span class="info-box-icon"><i class="ion-ios-chatbubble-outline"></i></span>
                <div class="info-box-content">
                  <span class="info-box-text">Direct Messages</span>
                  <span class="info-box-number">163,921</span>
                  <div class="progress">
                    <div class="progress-bar" style="width: 40%"></div>
                  </div>
                  <span class="progress-description">
                    40% Increase in 30 Days
                  </span>
                </div><!-- /.info-box-content -->
              </div><!-- /.info-box -->
                </div>
              </div><!-- /.box -->
</div>






        <!-- jQuery 2.1.4 -->
        <!-- Page specific script -->
    <script type="text/javascript">
      $(function () {

        /* initialize the external events
         -----------------------------------------------------------------*/
        function ini_events(ele) {
          ele.each(function () {

            // create an Event Object (http://arshaw.com/fullcalendar/docs/event_data/Event_Object/)
            // it doesn't need to have a start or end
            var eventObject = {
              title: $.trim($(this).text()) // use the element's text as the event title
            };

            // store the Event Object in the DOM element so we can get to it later
            $(this).data('eventObject', eventObject);

            // make the event draggable using jQuery UI
            $(this).draggable({
              zIndex: 1070,
              revert: true, // will cause the event to go back to its
              revertDuration: 0  //  original position after the drag
            });

          });
        }
        ini_events($('#external-events div.external-event'));

        /* initialize the calendar
         -----------------------------------------------------------------*/
        //Date for the calendar events (dummy data)
        var date = new Date();
        var d = date.getDate(),
                m = date.getMonth(),
                y = date.getFullYear();
        $('#calendar').fullCalendar({
          header: {
            left: 'prev,next today',
            center: 'title',
            right: 'month,agendaWeek,agendaDay'
          },
          buttonText: {
            today: 'today',
            month: 'month',
            week: 'week',
            day: 'day'
          },
          //Random default events
          events: [
            {
              title: 'All Day Event',
              start: new Date(y, m, 1),
              backgroundColor: "#f56954", //red
              borderColor: "#f56954" //red
            },
            {
              title: 'Long Event',
              start: new Date(y, m, d - 5),
              end: new Date(y, m, d - 2),
              backgroundColor: "#f39c12", //yellow
              borderColor: "#f39c12" //yellow
            },
            {
              title: 'Meeting',
              start: new Date(y, m, d, 10, 30),
              allDay: false,
              backgroundColor: "#0073b7", //Blue
              borderColor: "#0073b7" //Blue
            },
            {
              title: 'Lunch',
              start: new Date(y, m, d, 12, 0),
              end: new Date(y, m, d, 14, 0),
              allDay: false,
              backgroundColor: "#00c0ef", //Info (aqua)
              borderColor: "#00c0ef" //Info (aqua)
            },
            {
              title: 'Birthday Party',
              start: new Date(y, m, d + 1, 19, 0),
              end: new Date(y, m, d + 1, 22, 30),
              allDay: false,
              backgroundColor: "#00a65a", //Success (green)
              borderColor: "#00a65a" //Success (green)
            },
            {
              title: 'Click for Google',
              start: new Date(y, m, 28),
              end: new Date(y, m, 29),
              url: 'http://google.com/',
              backgroundColor: "#3c8dbc", //Primary (light-blue)
              borderColor: "#3c8dbc" //Primary (light-blue)
            }
          ],
          editable: true,
          droppable: true, // this allows things to be dropped onto the calendar !!!
          drop: function (date, allDay) { // this function is called when something is dropped

            // retrieve the dropped element's stored Event Object
            var originalEventObject = $(this).data('eventObject');

            // we need to copy it, so that multiple events don't have a reference to the same object
            var copiedEventObject = $.extend({}, originalEventObject);

            // assign it the date that was reported
            copiedEventObject.start = date;
            copiedEventObject.allDay = allDay;
            copiedEventObject.backgroundColor = $(this).css("background-color");
            copiedEventObject.borderColor = $(this).css("border-color");

            // render the event on the calendar
            // the last `true` argument determines if the event "sticks" (http://arshaw.com/fullcalendar/docs/event_rendering/renderEvent/)
            $('#calendar').fullCalendar('renderEvent', copiedEventObject, true);

            // is the "remove after drop" checkbox checked?
            if ($('#drop-remove').is(':checked')) {
              // if so, remove the element from the "Draggable Events" list
              $(this).remove();
            }

          }
        });

        /* ADDING EVENTS */
        var currColor = "#3c8dbc"; //Red by default
        //Color chooser button
        var colorChooser = $("#color-chooser-btn");
        $("#color-chooser > li > a").click(function (e) {
          e.preventDefault();
          //Save color
          currColor = $(this).css("color");
          //Add color effect to button
          $('#add-new-event').css({"background-color": currColor, "border-color": currColor});
        });
        $("#add-new-event").click(function (e) {
          e.preventDefault();
          //Get value and make sure it is not null
          var val = $("#new-event").val();
          if (val.length == 0) {
            return;
          }

          //Create events
          var event = $("<div />");
          event.css({"background-color": currColor, "border-color": currColor, "color": "#fff"}).addClass("external-event");
          event.html(val);
          $('#external-events').prepend(event);

          //Add draggable funtionality
          ini_events(event);

          //Remove event from text input
          $("#new-event").val("");
        });
      });
    </script>
    
@stop