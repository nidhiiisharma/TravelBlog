@extends('layouts.app')

@section('content')
<main role="main">
    <div class="jumbotron-1" style="width:100%;height:50%;text-align:center;margin-bottom:50px;">
            <h2 class="display-3">About Us</h2>
            <p>Lorem ipsum dolor sit amet, sed et magna moderatius disputationi, mea tamquam eligendi electram id. Vix mundi labore propriae ei, duo brute denique facilisi et.</p>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <div class="well well-sm">
                    <form>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                <label for="name">
                                    Name</label>
                                <input type="text" class="form-control" id="name" placeholder="Enter name" required="required" />
                            </div>
                            <div class="form-group">
                                    <label for="email">Email Address</label>
                                    <input type="email" class="form-control" id="email" placeholder="Enter email" required="required" />
                            </div>
                                        <div class="form-group">
                                            <label for="subject">
                                                Subject</label>
                                            <select id="subject" name="subject" class="form-control" required="required">
                                                <option value="na" selected="">Choose One:</option>
                                                <option value="service">General Customer Service</option>
                                                <option value="suggestions">Suggestions</option>
                                            </select>
                                        </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="name">
                                            Message</label>
                                            <textarea name="message" id="message" class="form-control" rows="9" cols="25" required="required"
                                            placeholder="Message"></textarea>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <button type="submit" class="btn btn-primary pull-right" id="btnContactUs">
                                        Send Message</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-md-4">
                    <form>
                        <legend><span class="glyphicon glyphicon-globe"></span> Our office</legend>
                        <address>
                            <strong>TravelBlog</strong><br>
                            Rachelsmolen 1<br>
                            Eindhoven, 5623PL<br>
                            <abbr title="Phone">
                                P:</abbr>
                                +31 617 29 327
                        </address>
                        <address>
                            <strong>Team Members</strong><br>
                            <a href="mailto:#">nidhisharma@gmail.com</a><br>
                            <a href="malito:#">rozalinamiladinova@gmail.com</a>
                        </address>
                    </form>
                </div>
            </div>
        </div>
    </main>
@endsection