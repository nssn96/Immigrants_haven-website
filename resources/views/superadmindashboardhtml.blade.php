<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{URL::asset('css/dashboard.css')}}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/lykmapipo/themify-icons@0.1.2/css/themify-icons.css">
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin='anonymous'></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <title>Document</title>
</head>

<body>
    <input type="checkbox"  id="sidebar-toggle">
    <div class="sidebar">
        <div class="sidebar-header">
            <h3 class="brand">
                <span class="ti-unlink"></span> 
                <span>{{$data['user']}}</span><br>
                <span>Super Admin </span>
            </h3>
            <label for="sidebar-toggle" class="ti-menu-alt"></label>
        </div>
        <div class="sidebar-menu">
            <ul>
                    <li>
                        <a href="managecontinentshtml">
                            <i class="fa fa-arrow-circle-left" style="font-size:24px"></i>
                        </a>
                    </li>
                    <li>
                        <a href="superadmindashboard">
                            <span>My Profile</span>
                        </a>
                    </li>
                    
                </ul>
            </ul>
        </div>
    </div>
    <div class="main-content">
        <header>
            <div class="search-wrapper">
                <span class="ti-search"></span>
                <input type="search" placeholder="Search">
            </div>
            <div class="social-icons">
                <span class="ti-bell"></span>
                <span class="ti-comment"></span>

            </div>
        </header>

        <main>
            <h2 class="dash-title">Overview</h2>
            <div class="dash-cards">
                <div class="card-single">
                    <div class="card-body">
                        <span class="ti-briefcase"></span>
                        <div>
                            <h5>Total Number of Admins</h5>
                            <h4>
                             {{$data['adminpercountry_count']}}
                            
                            </h4>
                        </div>
                    </div>
                    <div class="card-footer">
                        <a href="">View All</a>
                    </div>
                </div>
                <div class="card-single">
                    <div class="card-body">
                        <span class="ti-briefcase"></span>
                        <div>
                            <h5>Number of Immigrants</h5>
                            <h4>{{$data['immigrants_count']}}</h4>
                        </div>
                    </div>
                    <div class="card-footer">
                        <a href="piechart">View All</a>
                    </div>
                </div>
                <div class="card-single">
                    <div class="card-body">
                        <span class="ti-briefcase"></span>
                        <div>
                            <h5>Recent Registration</h5>
                            <h4>{{$data['recent_registration_count']}}</h4>
                        </div>
                    </div>
                    <div class="card-footer">
                        <a href="">View All</a>
                    </div>
                </div>
            </div>


            <section class="recent">
                <div class="activity-grid">  
                    <div class="activity-card">
                        <h3>Recent Activity</h3>
                        <table>
                            <thead>
                                <tr>
                                    <th>User Name</th>
                                    <th>Country of Origin</th>
                                    <th>Immigrated Country</th>
                                    <th>Registered Date</th>
                                    <th>Role</th>
                                </tr>
                            </thead>
                            @foreach($data['recent_registration_details'] as $details)
                            <tbody>
                                <tr>
                                    <td>{{$details['username']}}</td>
                                    <td>{{$details['nationality']}}</td>
                                    <td>{{$details['immigratedcountry']}}</td>
                                    <td>{{$details['date_created']}}</td>
                                    <td><span class="badge success">Active</span></td>
                                </tr>
                            </tbody>
                            @endforeach
                        </table>
                    </div>
                    <div class="summary">
                        <div class="summary-card">
                            <div class="summary-single">
                                <span class="ti-id-badge"></span>
                                <div>
                              
                                    <h5></h5>
                                    <small>Number of Queries</small>
                                </div>
                            </div>
                            <div class="summary-single">
                                <span class="ti-id-badge"></span>
                                <div>
                                    <h5></h5>
                                    <small>New Registrations</small>
                                </div>
                            </div>
                            <div class="summary-single">
                                <span class="ti-face-smile"></span>
                                <div>
                                    <h5>{{$data['media_count']}}</h5>
                                    <small>Total Media Content</small>
                                </div>
                            </div>
                        </div>
                        <div class="bday-card">
                            <div class="bday-flex">
                                <div class="bday-img"></div>
                                <div class="bday-info">
                                @if($data['birthday'])
                                @foreach($data['birthday'] as $bday)
                                    <h5>{{$bday['username']}}</h5>
                                    <small>Happy Birthday</small>
                                    @endforeach
                                    @else
                                    <small>No Birthday</small>
                                    @endif
                                </div>
                                <div class="text-center">
                                    <button>
                                        <span class="ti-gift"></span>
                                        Wish
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </section>
            <div class="birthday-card">

            </div>
    </div>
    </div>

    </section>
    </section>

    </main>
    </div>
</body>

</html>