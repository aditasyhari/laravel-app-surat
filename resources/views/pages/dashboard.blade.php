@extends('layout.master')
@section('content')
<div class="row">
    <div class="content-wrapper-before gradient-45deg-indigo-purple"></div>
    <div class="col s12">
        <div class="container">
            <!-- Current balance & total transactions cards-->
            <div class="row mt-4">
                <div class="col s12 m4 l4">
                    <!-- Current Balance -->
                    <div class="card animate fadeLeft">
                        <div class="card-content">
                            <h4 class="card-title mb-0">Current Balance <i
                                    class="material-icons float-right">more_vert</i></h4>
                            <p class="medium-small">This billing cycle</p>
                            <div class="current-balance-container">
                                <div id="current-balance-donut-chart" class="current-balance-shadow"></div>
                            </div>
                            <h5 class="center-align">$ 50,150.00</h5>
                            <p class="medium-small center-align">Used balance this billing cycle</p>
                        </div>
                    </div>
                </div>
                <div class="col s12 m8 l8 animate fadeRight">
                    <!-- Total Transaction -->
                    <div class="card">
                        <div class="card-content">
                            <h4 class="card-title mb-0">Total Transaction <i
                                    class="material-icons float-right">more_vert</i></h4>
                            <p class="medium-small">This month transaction</p>
                            <div class="total-transaction-container">
                                <div id="total-transaction-line-chart" class="total-transaction-shadow"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--/ Current balance & total transactions cards-->

            <!-- User statistics & appointment cards-->
            <div class="row">
                <div class="col s12 l5">
                    <!-- User Statistics -->
                    <div class="card user-statistics-card animate fadeLeft">
                        <div class="card-content">
                            <h4 class="card-title mb-0">User Statistics <i
                                    class="material-icons float-right">more_vert</i></h4>
                            <div class="row">
                                <div class="col s12 m6">
                                    <ul class="collection border-none mb-0">
                                        <li class="collection-item avatar">
                                            <i class="material-icons circle pink accent-2">trending_up</i>
                                            <p class="medium-small">This year</p>
                                            <h5 class="mt-0 mb-0">60%</h5>
                                        </li>
                                    </ul>
                                </div>
                                <div class="col s12 m6">
                                    <ul class="collection border-none mb-0">
                                        <li class="collection-item avatar">
                                            <i class="material-icons circle purple accent-4">trending_down</i>
                                            <p class="medium-small">Last year</p>
                                            <h5 class="mt-0 mb-0">40%</h5>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="user-statistics-container">
                                <div id="user-statistics-bar-chart" class="user-statistics-shadow"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col s12 l4">
                    <!-- Recent Buyers -->
                    <div class="card recent-buyers-card animate fadeUp">
                        <div class="card-content">
                            <h4 class="card-title mb-0">Recent Buyers <i
                                    class="material-icons float-right">more_vert</i></h4>
                            <p class="medium-small pt-2">Today</p>
                            <ul class="collection mb-0">
                                <li class="collection-item avatar">
                                    <img src="{{asset('app-assets/images/avatar/avatar-7.png')}}" alt=""
                                        class="circle" />
                                    <p class="font-weight-600">John Doe</p>
                                    <p class="medium-small">18, January 2019</p>
                                    <a href="#!" class="secondary-content"><i
                                            class="material-icons">star_border</i></a>
                                </li>
                                <li class="collection-item avatar">
                                    <img src="{{asset('app-assets/images/avatar/avatar-3.png')}}" alt=""
                                        class="circle" />
                                    <p class="font-weight-600">Adam Garza</p>
                                    <p class="medium-small">20, January 2019</p>
                                    <a href="#!" class="secondary-content"><i
                                            class="material-icons">star_border</i></a>
                                </li>
                                <li class="collection-item avatar">
                                    <img src="{{asset('app-assets/images/avatar/avatar-5.png')}}" alt=""
                                        class="circle" />
                                    <p class="font-weight-600">Jennifer Rice</p>
                                    <p class="medium-small">25, January 2019</p>
                                    <a href="#!" class="secondary-content"><i
                                            class="material-icons">star_border</i></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col s12 l3">
                    <div class="card animate fadeRight">
                        <div class="card-content">
                            <h4 class="card-title mb-0">Conversion Ratio</h4>
                            <div class="conversion-ration-container mt-8">
                                <div id="conversion-ration-bar-chart" class="conversion-ration-shadow"></div>
                            </div>
                            <p class="medium-small center-align">This month conversion ratio</p>
                            <h5 class="center-align mb-0 mt-0">62%</h5>
                        </div>
                    </div>
                </div>
            </div>
            <!--/ Current balance & appointment cards-->

            <div class="row">
                <div class="col s12 m6 l4">
                    <div class="card padding-4 animate fadeLeft">
                        <div class="col s5 m5">
                            <h5 class="mb-0">1885</h5>
                            <p class="no-margin">New</p>
                            <p class="mb-0 pt-8">1,12,900</p>
                        </div>
                        <div class="col s7 m7 right-align">
                            <i
                                class="material-icons background-round mt-5 mb-5 gradient-45deg-purple-amber gradient-shadow white-text">perm_identity</i>
                            <p class="mb-0">Total Clients</p>
                        </div>
                    </div>
                    <div id="chartjs" class="card pt-0 pb-0 animate fadeLeft">
                        <div class="padding-2 ml-2">
                            <span class="new badge gradient-45deg-indigo-purple gradient-shadow mt-2 mr-2">+
                                $900</span>
                            <p class="mt-2 mb-0 font-weight-600">Today's revenue</p>
                            <p class="no-margin grey-text lighten-3">$40,512 avg</p>
                            <h5>$ 22,300</h5>
                        </div>
                        <div class="row">
                            <div class="sample-chart-wrapper card-gradient-chart">
                                <canvas id="custom-line-chart-sample-three" class="center"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col s12 m6 l8">
                    <div class="card subscriber-list-card animate fadeRight">
                        <div class="card-content pb-1">
                            <h4 class="card-title mb-0">Subscriber List <i
                                    class="material-icons float-right">more_vert</i></h4>
                        </div>
                        <table class="subscription-table responsive-table highlight">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Company</th>
                                    <th>Start Date</th>
                                    <th>Status</th>
                                    <th>Amount</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Michael Austin</td>
                                    <td>ABC Fintech LTD.</td>
                                    <td>Jan 1,2019</td>
                                    <td><span class="badge pink lighten-5 pink-text text-accent-2">Close</span>
                                    </td>
                                    <td>$ 1000.00</td>
                                    <td class="center-align"><a href="#"><i
                                                class="material-icons pink-text">clear</i></a></td>
                                </tr>
                                <tr>
                                    <td>Aldin Rakić</td>
                                    <td>ACME Pvt LTD.</td>
                                    <td>Jan 10,2019</td>
                                    <td><span class="badge green lighten-5 green-text text-accent-4">Open</span>
                                    </td>
                                    <td>$ 3000.00</td>
                                    <td class="center-align"><a href="#"><i
                                                class="material-icons pink-text">clear</i></a></td>
                                </tr>
                                <tr>
                                    <td>İris Yılmaz</td>
                                    <td>Collboy Tech LTD.</td>
                                    <td>Jan 12,2019</td>
                                    <td><span class="badge green lighten-5 green-text text-accent-4">Open</span>
                                    </td>
                                    <td>$ 2000.00</td>
                                    <td class="center-align"><a href="#"><i
                                                class="material-icons pink-text">clear</i></a></td>
                                </tr>
                                <tr>
                                    <td>Lidia Livescu</td>
                                    <td>My Fintech LTD.</td>
                                    <td>Jan 14,2019</td>
                                    <td><span class="badge pink lighten-5 pink-text text-accent-2">Close</span>
                                    </td>
                                    <td>$ 1100.00</td>
                                    <td class="center-align"><a href="#"><i
                                                class="material-icons pink-text">clear</i></a></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div><!-- START RIGHT SIDEBAR NAV -->
            <aside id="right-sidebar-nav">
                <div id="slide-out-right" class="slide-out-right-sidenav sidenav rightside-navigation">
                    <div class="row">
                        <div class="slide-out-right-title">
                            <div class="col s12 border-bottom-1 pb-0 pt-1">
                                <div class="row">
                                    <div class="col s2 pr-0 center">
                                        <i class="material-icons vertical-text-middle"><a href="#"
                                                class="sidenav-close">clear</a></i>
                                    </div>
                                    <div class="col s10 pl-0">
                                        <ul class="tabs">
                                            <li class="tab col s4 p-0">
                                                <a href="#messages" class="active">
                                                    <span>Messages</span>
                                                </a>
                                            </li>
                                            <li class="tab col s4 p-0">
                                                <a href="#settings">
                                                    <span>Settings</span>
                                                </a>
                                            </li>
                                            <li class="tab col s4 p-0">
                                                <a href="#activity">
                                                    <span>Activity</span>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="slide-out-right-body">
                            <div id="messages" class="col s12">
                                <div class="collection border-none">
                                    <input class="header-search-input mt-4 mb-2" type="text" name="Search"
                                        placeholder="Search Messages" />
                                    <ul class="collection p-0">
                                        <li class="collection-item sidenav-trigger display-flex avatar pl-5 pb-0"
                                            data-target="slide-out-chat">
                                            <span class="avatar-status avatar-online avatar-50"><img
                                                    src="{{asset('app-assets/images/avatar/avatar-7.png')}}"
                                                    alt="avatar" />
                                                <i></i>
                                            </span>
                                            <div class="user-content">
                                                <h6 class="line-height-0">Elizabeth Elliott</h6>
                                                <p class="medium-small blue-grey-text text-lighten-3 pt-3">Thank
                                                    you</p>
                                            </div>
                                            <span class="secondary-content medium-small">5.00 AM</span>
                                        </li>
                                        <li class="collection-item sidenav-trigger display-flex avatar pl-5 pb-0"
                                            data-target="slide-out-chat">
                                            <span class="avatar-status avatar-online avatar-50"><img
                                                    src="{{asset('app-assets/images/avatar/avatar-1.png')}}"
                                                    alt="avatar" />
                                                <i></i>
                                            </span>
                                            <div class="user-content">
                                                <h6 class="line-height-0">Mary Adams</h6>
                                                <p class="medium-small blue-grey-text text-lighten-3 pt-3">Hello
                                                    Boo</p>
                                            </div>
                                            <span class="secondary-content medium-small">4.14 AM</span>
                                        </li>
                                        <li class="collection-item sidenav-trigger display-flex avatar pl-5 pb-0"
                                            data-target="slide-out-chat">
                                            <span class="avatar-status avatar-off avatar-50"><img
                                                    src="{{asset('app-assets/images/avatar/avatar-2.png')}}"
                                                    alt="avatar" />
                                                <i></i>
                                            </span>
                                            <div class="user-content">
                                                <h6 class="line-height-0">Caleb Richards</h6>
                                                <p class="medium-small blue-grey-text text-lighten-3 pt-3">Hello
                                                    Boo</p>
                                            </div>
                                            <span class="secondary-content medium-small">4.14 AM</span>
                                        </li>
                                        <li class="collection-item sidenav-trigger display-flex avatar pl-5 pb-0"
                                            data-target="slide-out-chat">
                                            <span class="avatar-status avatar-online avatar-50"><img
                                                    src="{{asset('app-assets/images/avatar/avatar-3.png')}}"
                                                    alt="avatar" />
                                                <i></i>
                                            </span>
                                            <div class="user-content">
                                                <h6 class="line-height-0">Caleb Richards</h6>
                                                <p class="medium-small blue-grey-text text-lighten-3 pt-3">Keny
                                                    !</p>
                                            </div>
                                            <span class="secondary-content medium-small">9.00 PM</span>
                                        </li>
                                        <li class="collection-item sidenav-trigger display-flex avatar pl-5 pb-0"
                                            data-target="slide-out-chat">
                                            <span class="avatar-status avatar-online avatar-50"><img
                                                    src="{{asset('app-assets/images/avatar/avatar-4.png')}}"
                                                    alt="avatar" />
                                                <i></i>
                                            </span>
                                            <div class="user-content">
                                                <h6 class="line-height-0">June Lane</h6>
                                                <p class="medium-small blue-grey-text text-lighten-3 pt-3">Ohh
                                                    God</p>
                                            </div>
                                            <span class="secondary-content medium-small">4.14 AM</span>
                                        </li>
                                        <li class="collection-item sidenav-trigger display-flex avatar pl-5 pb-0"
                                            data-target="slide-out-chat">
                                            <span class="avatar-status avatar-off avatar-50"><img
                                                    src="{{asset('app-assets/images/avatar/avatar-5.png')}}"
                                                    alt="avatar" />
                                                <i></i>
                                            </span>
                                            <div class="user-content">
                                                <h6 class="line-height-0">Edward Fletcher</h6>
                                                <p class="medium-small blue-grey-text text-lighten-3 pt-3">Love
                                                    you</p>
                                            </div>
                                            <span class="secondary-content medium-small">5.15 PM</span>
                                        </li>
                                        <li class="collection-item sidenav-trigger display-flex avatar pl-5 pb-0"
                                            data-target="slide-out-chat">
                                            <span class="avatar-status avatar-online avatar-50"><img
                                                    src="{{asset('app-assets/images/avatar/avatar-6.png')}}"
                                                    alt="avatar" />
                                                <i></i>
                                            </span>
                                            <div class="user-content">
                                                <h6 class="line-height-0">Crystal Bates</h6>
                                                <p class="medium-small blue-grey-text text-lighten-3 pt-3">Can
                                                    we</p>
                                            </div>
                                            <span class="secondary-content medium-small">8.00 AM</span>
                                        </li>
                                        <li class="collection-item sidenav-trigger display-flex avatar pl-5 pb-0"
                                            data-target="slide-out-chat">
                                            <span class="avatar-status avatar-off avatar-50"><img
                                                    src="{{asset('app-assets/images/avatar/avatar-7.png')}}"
                                                    alt="avatar" />
                                                <i></i>
                                            </span>
                                            <div class="user-content">
                                                <h6 class="line-height-0">Nathan Watts</h6>
                                                <p class="medium-small blue-grey-text text-lighten-3 pt-3">
                                                    Great!</p>
                                            </div>
                                            <span class="secondary-content medium-small">9.53 PM</span>
                                        </li>
                                        <li class="collection-item sidenav-trigger display-flex avatar pl-5 pb-0"
                                            data-target="slide-out-chat">
                                            <span class="avatar-status avatar-off avatar-50"><img
                                                    src="{{asset('app-assets/images/avatar/avatar-8.png')}}"
                                                    alt="avatar" />
                                                <i></i>
                                            </span>
                                            <div class="user-content">
                                                <h6 class="line-height-0">Willard Wood</h6>
                                                <p class="medium-small blue-grey-text text-lighten-3 pt-3">Do it
                                                </p>
                                            </div>
                                            <span class="secondary-content medium-small">4.20 AM</span>
                                        </li>
                                        <li class="collection-item sidenav-trigger display-flex avatar pl-5 pb-0"
                                            data-target="slide-out-chat">
                                            <span class="avatar-status avatar-online avatar-50"><img
                                                    src="{{asset('app-assets/images/avatar/avatar-1.png')}}"
                                                    alt="avatar" />
                                                <i></i>
                                            </span>
                                            <div class="user-content">
                                                <h6 class="line-height-0">Ronnie Ellis</h6>
                                                <p class="medium-small blue-grey-text text-lighten-3 pt-3">Got
                                                    that</p>
                                            </div>
                                            <span class="secondary-content medium-small">5.20 AM</span>
                                        </li>
                                        <li class="collection-item sidenav-trigger display-flex avatar pl-5 pb-0"
                                            data-target="slide-out-chat">
                                            <span class="avatar-status avatar-online avatar-50"><img
                                                    src="{{asset('app-assets/images/avatar/avatar-9.png')}}"
                                                    alt="avatar" />
                                                <i></i>
                                            </span>
                                            <div class="user-content">
                                                <h6 class="line-height-0">Daniel Russell</h6>
                                                <p class="medium-small blue-grey-text text-lighten-3 pt-3">Thank
                                                    you</p>
                                            </div>
                                            <span class="secondary-content medium-small">12.00 AM</span>
                                        </li>
                                        <li class="collection-item sidenav-trigger display-flex avatar pl-5 pb-0"
                                            data-target="slide-out-chat">
                                            <span class="avatar-status avatar-off avatar-50"><img
                                                    src="{{asset('app-assets/images/avatar/avatar-10.png')}}"
                                                    alt="avatar" />
                                                <i></i>
                                            </span>
                                            <div class="user-content">
                                                <h6 class="line-height-0">Sarah Graves</h6>
                                                <p class="medium-small blue-grey-text text-lighten-3 pt-3">Okay
                                                    you</p>
                                            </div>
                                            <span class="secondary-content medium-small">11.14 PM</span>
                                        </li>
                                        <li class="collection-item sidenav-trigger display-flex avatar pl-5 pb-0"
                                            data-target="slide-out-chat">
                                            <span class="avatar-status avatar-off avatar-50"><img
                                                    src="{{asset('app-assets/images/avatar/avatar-11.png')}}"
                                                    alt="avatar" />
                                                <i></i>
                                            </span>
                                            <div class="user-content">
                                                <h6 class="line-height-0">Andrew Hoffman</h6>
                                                <p class="medium-small blue-grey-text text-lighten-3 pt-3">Can
                                                    do</p>
                                            </div>
                                            <span class="secondary-content medium-small">7.30 PM</span>
                                        </li>
                                        <li class="collection-item sidenav-trigger display-flex avatar pl-5 pb-0"
                                            data-target="slide-out-chat">
                                            <span class="avatar-status avatar-online avatar-50"><img
                                                    src="{{asset('app-assets/images/avatar/avatar-12.png')}}"
                                                    alt="avatar" />
                                                <i></i>
                                            </span>
                                            <div class="user-content">
                                                <h6 class="line-height-0">Camila Lynch</h6>
                                                <p class="medium-small blue-grey-text text-lighten-3 pt-3">Leave
                                                    it</p>
                                            </div>
                                            <span class="secondary-content medium-small">2.00 PM</span>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div id="settings" class="col s12">
                                <p class="mt-8 mb-0 ml-5 font-weight-900">GENERAL SETTINGS</p>
                                <ul class="collection border-none">
                                    <li class="collection-item border-none mt-3">
                                        <div class="m-0">
                                            <span>Notifications</span>
                                            <div class="switch right">
                                                <label>
                                                    <input checked type="checkbox" />
                                                    <span class="lever"></span>
                                                </label>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="collection-item border-none mt-3">
                                        <div class="m-0">
                                            <span>Show recent activity</span>
                                            <div class="switch right">
                                                <label>
                                                    <input type="checkbox" />
                                                    <span class="lever"></span>
                                                </label>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="collection-item border-none mt-3">
                                        <div class="m-0">
                                            <span>Show recent activity</span>
                                            <div class="switch right">
                                                <label>
                                                    <input type="checkbox" />
                                                    <span class="lever"></span>
                                                </label>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="collection-item border-none mt-3">
                                        <div class="m-0">
                                            <span>Show Task statistics</span>
                                            <div class="switch right">
                                                <label>
                                                    <input type="checkbox" />
                                                    <span class="lever"></span>
                                                </label>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="collection-item border-none mt-3">
                                        <div class="m-0">
                                            <span>Show your emails</span>
                                            <div class="switch right">
                                                <label>
                                                    <input type="checkbox" />
                                                    <span class="lever"></span>
                                                </label>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="collection-item border-none mt-3">
                                        <div class="m-0">
                                            <span>Email Notifications</span>
                                            <div class="switch right">
                                                <label>
                                                    <input checked type="checkbox" />
                                                    <span class="lever"></span>
                                                </label>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                                <p class="mt-8 mb-0 ml-5 font-weight-900">SYSTEM SETTINGS</p>
                                <ul class="collection border-none">
                                    <li class="collection-item border-none mt-3">
                                        <div class="m-0">
                                            <span>System Logs</span>
                                            <div class="switch right">
                                                <label>
                                                    <input type="checkbox" />
                                                    <span class="lever"></span>
                                                </label>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="collection-item border-none mt-3">
                                        <div class="m-0">
                                            <span>Error Reporting</span>
                                            <div class="switch right">
                                                <label>
                                                    <input type="checkbox" />
                                                    <span class="lever"></span>
                                                </label>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="collection-item border-none mt-3">
                                        <div class="m-0">
                                            <span>Applications Logs</span>
                                            <div class="switch right">
                                                <label>
                                                    <input checked type="checkbox" />
                                                    <span class="lever"></span>
                                                </label>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="collection-item border-none mt-3">
                                        <div class="m-0">
                                            <span>Backup Servers</span>
                                            <div class="switch right">
                                                <label>
                                                    <input type="checkbox" />
                                                    <span class="lever"></span>
                                                </label>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="collection-item border-none mt-3">
                                        <div class="m-0">
                                            <span>Audit Logs</span>
                                            <div class="switch right">
                                                <label>
                                                    <input type="checkbox" />
                                                    <span class="lever"></span>
                                                </label>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                            <div id="activity" class="col s12">
                                <div class="activity">
                                    <p class="mt-5 mb-0 ml-5 font-weight-900">SYSTEM LOGS</p>
                                    <ul class="collection with-header">
                                        <li class="collection-item">
                                            <div class="font-weight-900">
                                                Homepage mockup design <span class="secondary-content">Just
                                                    now</span>
                                            </div>
                                            <p class="mt-0 mb-2">Melissa liked your activity.</p>
                                            <span class="new badge amber" data-badge-caption="Important">
                                            </span>
                                        </li>
                                        <li class="collection-item">
                                            <div class="font-weight-900">
                                                Melissa liked your activity Drinks. <span
                                                    class="secondary-content">10 mins</span>
                                            </div>
                                            <p class="mt-0 mb-2">Here are some news feed interactions concepts.
                                            </p>
                                            <span class="new badge light-green"
                                                data-badge-caption="Resolved"></span>
                                        </li>
                                        <li class="collection-item">
                                            <div class="font-weight-900">
                                                12 new users registered <span class="secondary-content">30
                                                    mins</span>
                                            </div>
                                            <p class="mt-0 mb-2">Here are some news feed interactions concepts.
                                            </p>
                                        </li>
                                        <li class="collection-item">
                                            <div class="font-weight-900">
                                                Tina is attending your activity <span
                                                    class="secondary-content">2 hrs</span>
                                            </div>
                                            <p class="mt-0 mb-2">Here are some news feed interactions concepts.
                                            </p>
                                        </li>
                                        <li class="collection-item">
                                            <div class="font-weight-900">
                                                Josh is now following you <span class="secondary-content">5
                                                    hrs</span>
                                            </div>
                                            <p class="mt-0 mb-2">Here are some news feed interactions concepts.
                                            </p>
                                            <span class="new badge red" data-badge-caption="Pending"></span>
                                        </li>
                                    </ul>
                                    <p class="mt-5 mb-0 ml-5 font-weight-900">APPLICATIONS LOGS</p>
                                    <ul class="collection with-header">
                                        <li class="collection-item">
                                            <div class="font-weight-900">
                                                New order received urgent <span class="secondary-content">Just
                                                    now</span>
                                            </div>
                                            <p class="mt-0 mb-2">Melissa liked your activity.</p>
                                        </li>
                                        <li class="collection-item">
                                            <div class="font-weight-900">System shutdown. <span
                                                    class="secondary-content">5 min</span></div>
                                            <p class="mt-0 mb-2">Here are some news feed interactions concepts.
                                            </p>
                                            <span class="new badge blue" data-badge-caption="Urgent"> </span>
                                        </li>
                                        <li class="collection-item">
                                            <div class="font-weight-900">
                                                Database overloaded 89% <span class="secondary-content">20
                                                    min</span>
                                            </div>
                                            <p class="mt-0 mb-2">Here are some news feed interactions concepts.
                                            </p>
                                        </li>
                                    </ul>
                                    <p class="mt-5 mb-0 ml-5 font-weight-900">SERVER LOGS</p>
                                    <ul class="collection with-header">
                                        <li class="collection-item">
                                            <div class="font-weight-900">System error <span
                                                    class="secondary-content">10 min</span></div>
                                            <p class="mt-0 mb-2">Melissa liked your activity.</p>
                                        </li>
                                        <li class="collection-item">
                                            <div class="font-weight-900">
                                                Production server down. <span class="secondary-content">1
                                                    hrs</span>
                                            </div>
                                            <p class="mt-0 mb-2">Here are some news feed interactions concepts.
                                            </p>
                                            <span class="new badge blue" data-badge-caption="Urgent"></span>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Slide Out Chat -->
                <ul id="slide-out-chat" class="sidenav slide-out-right-sidenav-chat">
                    <li class="center-align pt-2 pb-2 sidenav-close chat-head">
                        <a href="#!"><i class="material-icons mr-0">chevron_left</i>Elizabeth Elliott</a>
                    </li>
                    <li class="chat-body">
                        <ul class="collection">
                            <li class="collection-item display-flex avatar pl-5 pb-0"
                                data-target="slide-out-chat">
                                <span class="avatar-status avatar-online avatar-50"><img
                                        src="{{asset('app-assets/images/avatar/avatar-7.png')}}" alt="avatar" />
                                </span>
                                <div class="user-content speech-bubble">
                                    <p class="medium-small">hello!</p>
                                </div>
                            </li>
                            <li class="collection-item display-flex avatar justify-content-end pl-5 pb-0"
                                data-target="slide-out-chat">
                                <div class="user-content speech-bubble-right">
                                    <p class="medium-small">How can we help? We're here for you!</p>
                                </div>
                            </li>
                            <li class="collection-item display-flex avatar pl-5 pb-0"
                                data-target="slide-out-chat">
                                <span class="avatar-status avatar-online avatar-50"><img
                                        src="{{asset('app-assets/images/avatar/avatar-7.png')}}" alt="avatar" />
                                </span>
                                <div class="user-content speech-bubble">
                                    <p class="medium-small">I am looking for the best admin template.?</p>
                                </div>
                            </li>
                            <li class="collection-item display-flex avatar justify-content-end pl-5 pb-0"
                                data-target="slide-out-chat">
                                <div class="user-content speech-bubble-right">
                                    <p class="medium-small">Materialize admin is the responsive materializecss
                                        admin template.</p>
                                </div>
                            </li>

                            <li class="collection-item display-grid width-100 center-align">
                                <p>8:20 a.m.</p>
                            </li>

                            <li class="collection-item display-flex avatar pl-5 pb-0"
                                data-target="slide-out-chat">
                                <span class="avatar-status avatar-online avatar-50"><img
                                        src="{{asset('app-assets/images/avatar/avatar-7.png')}}" alt="avatar" />
                                </span>
                                <div class="user-content speech-bubble">
                                    <p class="medium-small">Ohh! very nice</p>
                                </div>
                            </li>
                            <li class="collection-item display-flex avatar justify-content-end pl-5 pb-0"
                                data-target="slide-out-chat">
                                <div class="user-content speech-bubble-right">
                                    <p class="medium-small">Thank you.</p>
                                </div>
                            </li>
                            <li class="collection-item display-flex avatar pl-5 pb-0"
                                data-target="slide-out-chat">
                                <span class="avatar-status avatar-online avatar-50"><img
                                        src="{{asset('app-assets/images/avatar/avatar-7.png')}}" alt="avatar" />
                                </span>
                                <div class="user-content speech-bubble">
                                    <p class="medium-small">How can I purchase it?</p>
                                </div>
                            </li>

                            <li class="collection-item display-grid width-100 center-align">
                                <p>9:00 a.m.</p>
                            </li>

                            <li class="collection-item display-flex avatar justify-content-end pl-5 pb-0"
                                data-target="slide-out-chat">
                                <div class="user-content speech-bubble-right">
                                    <p class="medium-small">From ThemeForest.</p>
                                </div>
                            </li>
                            <li class="collection-item display-flex avatar justify-content-end pl-5 pb-0"
                                data-target="slide-out-chat">
                                <div class="user-content speech-bubble-right">
                                    <p class="medium-small">Only $24</p>
                                </div>
                            </li>
                            <li class="collection-item display-flex avatar pl-5 pb-0"
                                data-target="slide-out-chat">
                                <span class="avatar-status avatar-online avatar-50"><img
                                        src="{{asset('app-assets/images/avatar/avatar-7.png')}}" alt="avatar" />
                                </span>
                                <div class="user-content speech-bubble">
                                    <p class="medium-small">Ohh! Thank you.</p>
                                </div>
                            </li>
                            <li class="collection-item display-flex avatar pl-5 pb-0"
                                data-target="slide-out-chat">
                                <span class="avatar-status avatar-online avatar-50"><img
                                        src="{{asset('app-assets/images/avatar/avatar-7.png')}}" alt="avatar" />
                                </span>
                                <div class="user-content speech-bubble">
                                    <p class="medium-small">I will purchase it for sure.</p>
                                </div>
                            </li>
                            <li class="collection-item display-flex avatar justify-content-end pl-5 pb-0"
                                data-target="slide-out-chat">
                                <div class="user-content speech-bubble-right">
                                    <p class="medium-small">Great, Feel free to get in touch on</p>
                                </div>
                            </li>
                            <li class="collection-item display-flex avatar justify-content-end pl-5 pb-0"
                                data-target="slide-out-chat">
                                <div class="user-content speech-bubble-right">
                                    <p class="medium-small">https://pixinvent.ticksy.com/</p>
                                </div>
                            </li>
                        </ul>
                    </li>
                    <li class="center-align chat-footer">
                        <form class="col s12" onsubmit="slide_out_chat()" action="javascript:void(0);">
                            <div class="input-field">
                                <input id="icon_prefix" type="text" class="search" />
                                <label for="icon_prefix">Type here..</label>
                                <a onclick="slide_out_chat()"><i class="material-icons prefix">send</i></a>
                            </div>
                        </form>
                    </li>
                </ul>
            </aside>
            <!-- END RIGHT SIDEBAR NAV -->
        </div>
    </div>
</div>
@endsection
