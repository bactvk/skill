@extends('admin.layouts.app')
@section('title','Home')
@section('content')
<div class="right_col" role="main">
    <!-- top tiles -->
    <div class="row" style="display: inline-block;" >
      <div class="col-md-12 col-sm-12 tile_count">
        <div class="col-md-2 col-sm-4  tile_stats_count">
          <span class="count_top"><i class="fa fa-user"></i> Total Users</span>
          <div class="count">2500</div>
          <span class="count_bottom"><i class="green">4% </i> From last Week</span>
        </div>
        <div class="col-md-2 col-sm-4  tile_stats_count">
          <span class="count_top"><i class="fa fa-clock-o"></i> Average Time</span>
          <div class="count">123.50</div>
          <span class="count_bottom"><i class="green"><i class="fa fa-sort-asc"></i>3% </i> From last Week</span>
        </div>
        <div class="col-md-2 col-sm-4  tile_stats_count">
          <span class="count_top"><i class="fa fa-user"></i> Total Males</span>
          <div class="count green">2,500</div>
          <span class="count_bottom"><i class="green"><i class="fa fa-sort-asc"></i>34% </i> From last Week</span>
        </div>
        <div class="col-md-2 col-sm-4  tile_stats_count">
          <span class="count_top"><i class="fa fa-user"></i> Total Females</span>
          <div class="count">4,567</div>
          <span class="count_bottom"><i class="red"><i class="fa fa-sort-desc"></i>12% </i> From last Week</span>
        </div>
        <div class="col-md-2 col-sm-4  tile_stats_count">
          <span class="count_top"><i class="fa fa-user"></i> Total Collections</span>
          <div class="count">2,315</div>
          <span class="count_bottom"><i class="green"><i class="fa fa-sort-asc"></i>34% </i> From last Week</span>
        </div>
        <div class="col-md-2 col-sm-4  tile_stats_count">
          <span class="count_top"><i class="fa fa-user"></i> Total Connections</span>
          <div class="count">7,325</div>
          <span class="count_bottom"><i class="green"><i class="fa fa-sort-asc"></i>34% </i> From last Week</span>
        </div>
      </div>
    </div>
    <!-- /top tiles -->

    <div class="row">
      <div class="col-md-12 col-sm-12">
        <div class="row">
          <div class="col-md-12 col-sm-12 ">
            <div class="x_panel">
              <div class="x_title">
                <h2>Visitors location <small>geo-presentation</small></h2>
                <ul class="nav navbar-right panel_toolbox">
                  <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                  </li>
                  <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                        <a class="dropdown-item" href="#">Settings 1</a>
                        <a class="dropdown-item" href="#">Settings 2</a>
                      </div>
                  </li>
                  <li><a class="close-link"><i class="fa fa-close"></i></a>
                  </li>
                </ul>
                <div class="clearfix"></div>
              </div>
              <div class="x_content">
                <div class="dashboard-widget-content">
                  <div class="col-md-4 hidden-small">
                    <h2 class="line_30">125.7k Views from 60 countries</h2>

                    <table class="countries_list">
                      <tbody>
                        <tr>
                          <td>United States</td>
                          <td class="fs15 fw700 text-right">33%</td>
                        </tr>
                        <tr>
                          <td>France</td>
                          <td class="fs15 fw700 text-right">27%</td>
                        </tr>
                        <tr>
                          <td>Germany</td>
                          <td class="fs15 fw700 text-right">16%</td>
                        </tr>
                        <tr>
                          <td>Spain</td>
                          <td class="fs15 fw700 text-right">11%</td>
                        </tr>
                        <tr>
                          <td>Britain</td>
                          <td class="fs15 fw700 text-right">10%</td>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                  <div id="world-map-gdp" class="col-md-8 col-sm-12 " style="height:230px;"></div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="row">
          <!-- start of weather widget -->
          <div class="col-md-6 col-sm-6 offset-md-3">
            <div class="x_panel">
              <div class="x_title">
                <h2>Daily active users <small>Sessions</small></h2>
                <ul class="nav navbar-right panel_toolbox">
                  <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                  </li>
                  <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                        <a class="dropdown-item" href="#">Settings 1</a>
                        <a class="dropdown-item" href="#">Settings 2</a>
                      </div>
                  </li>
                  <li><a class="close-link"><i class="fa fa-close"></i></a>
                  </li>
                </ul>
                <div class="clearfix"></div>
              </div>
              <div class="x_content">
                <div class="row">
                  <div class="col-sm-12">
                    <div class="temperature"><b>Monday</b>, 07:30 AM
                      <span>F</span>
                      <span><b>C</b></span>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-sm-4">
                    <div class="weather-icon">
                      <canvas height="84" width="84" id="partly-cloudy-day"></canvas>
                    </div>
                  </div>
                  <div class="col-sm-8">
                    <div class="weather-text">
                      <h2>Texas <br><i>Partly Cloudy Day</i></h2>
                    </div>
                  </div>
                </div>
                <div class="col-sm-12">
                  <div class="weather-text pull-right">
                    <h3 class="degrees">23</h3>
                  </div>
                </div>

                <div class="clearfix"></div>

                <div class="row weather-days">
                  <div class="col-sm-2">
                    <div class="daily-weather">
                      <h2 class="day">Mon</h2>
                      <h3 class="degrees">25</h3>
                      <canvas id="clear-day" width="32" height="32"></canvas>
                      <h5>15 <i>km/h</i></h5>
                    </div>
                  </div>
                  <div class="col-sm-2">
                    <div class="daily-weather">
                      <h2 class="day">Tue</h2>
                      <h3 class="degrees">25</h3>
                      <canvas height="32" width="32" id="rain"></canvas>
                      <h5>12 <i>km/h</i></h5>
                    </div>
                  </div>
                  <div class="col-sm-2">
                    <div class="daily-weather">
                      <h2 class="day">Wed</h2>
                      <h3 class="degrees">27</h3>
                      <canvas height="32" width="32" id="snow"></canvas>
                      <h5>14 <i>km/h</i></h5>
                    </div>
                  </div>
                  <div class="col-sm-2">
                    <div class="daily-weather">
                      <h2 class="day">Thu</h2>
                      <h3 class="degrees">28</h3>
                      <canvas height="32" width="32" id="sleet"></canvas>
                      <h5>15 <i>km/h</i></h5>
                    </div>
                  </div>
                  <div class="col-sm-2">
                    <div class="daily-weather">
                      <h2 class="day">Fri</h2>
                      <h3 class="degrees">28</h3>
                      <canvas height="32" width="32" id="wind"></canvas>
                      <h5>11 <i>km/h</i></h5>
                    </div>
                  </div>
                  <div class="col-sm-2">
                    <div class="daily-weather">
                      <h2 class="day">Sat</h2>
                      <h3 class="degrees">26</h3>
                      <canvas height="32" width="32" id="cloudy"></canvas>
                      <h5>10 <i>km/h</i></h5>
                    </div>
                  </div>
                  <div class="clearfix"></div>
                </div>
              </div>
            </div>

          </div>
          <!-- end of weather widget -->
        </div>
      </div>
    </div>
</div>
@endsection