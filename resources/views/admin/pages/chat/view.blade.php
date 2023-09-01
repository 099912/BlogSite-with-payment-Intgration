@extends('admin.layout.master')
@section('content')
<div class="main-container">
    <div class="pd-ltr-20 xs-pd-20-10">
        <div class="min-height-200px">
            <div class="page-header">
                <div class="row">
                    <div class="col-md-6 col-sm-12">
                        <div class="title">
                            <h4>Chat</h4>
                        </div>
                        <nav aria-label="breadcrumb" role="navigation">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Chat</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
            <div class="bg-white border-radius-4 box-shadow mb-30">
                <div class="row no-gutters">
                    <div class="col-lg-3 col-md-4 col-sm-12">
                        <div class="chat-list bg-light-gray">
                            <div class="chat-search">
                                <span class="ti-search"></span>
                                <input type="text" name="name" id="username" placeholder="Search Contact">

                            </div>
                            <div class="notification-list chat-notification-list customscroll">
                                <ul>
                                    <li>
                                        <a href="#">
                                            <img src="{{asset('vendors/images/img.jpg')}}" alt="">
                                            <h3 class="clearfix">John Doe</h3>
                                            <p><i class="fa fa-circle text-light-green"></i> online</p>
                                        </a>
                                    </li>


                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-9 col-md-8 col-sm-12">
                        <div class="chat-detail">
                            <div class="chat-profile-header clearfix">
                                <div class="left">
                                    <div class="clearfix">
                                        <div class="chat-profile-photo">
                                            <img src="{{asset('vendors/images/profile-photo.jpg')}}" alt="">
                                        </div>
                                        <div class="chat-profile-name">
                                            <h3 >{{ auth()->user()->name ?? '' }}</h3>
                                            <span>New York, USA</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="right text-right">
                                    <div class="dropdown">
                                        <a class="btn btn-outline-primary dropdown-toggle" href="#" role="button" data-toggle="dropdown">
                                            Setting
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-right">
                                            <a class="dropdown-item" href="#">Export Chat</a>
                                            <a class="dropdown-item" href="#">Search</a>
                                            <a class="dropdown-item text-light-orange" href="#">Delete Chat</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="chat-box">


                                <div class="chat-desc customscroll">
                                    <ul id="chat-messages">

                                    </ul>
                                </div>
                            </div>

                                <div class="chat-footer">
                                    <div class="file-upload"><a href="#"><i class="fa fa-paperclip"></i></a></div>
                                    <form id="chat_form">
                                    <div class="chat_text_area">
                                        <textarea name="message" id="message" placeholder="Type your message…"></textarea>
                                    </div>
                                    <div class="chat_send">
                                        <button class="btn btn-link" id="message_send" type="submit"><i class="icon-copy ion-paper-airplane"></i></button>
                                    </div>
                                </form>
                                </div>
                            </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer-wrap pd-20 mb-20 card-box">
            DeskApp - Bootstrap 4 Admin Template By <a href="https://github.com/dropways" target="_blank">Ankit Hingarajiya</a>
        </div>
    </div>
</div>
@endsection
