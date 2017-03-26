
@extends('layouts.app')

<!-- Main Content -->
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-6 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">SIGN UP</div>
                <div class="panel-body">
                   
                    <div align="center">
                        @if($errors->first('message'))
                        <div class="alert alert-{{ $errors->first('alert')}}">
                            {{$errors->first('message')}} 
                        </div>    
                        @endif  
                    </div>
                      

                    <form class="form-horizontal" role="form" method="POST" action="{{ url('/password/email') }}">
                        
                         <div class="col-md-8 form-group{{ $errors->first('name', ' has-error') }} has-feedback">
                              {!! Form::text('email',null, ['class'=>'form-control', 'placeholder'=>'Enter Name']) !!}
                              <span class="glyphicon glyphicon-envelope form-control-feedback input-img"></span>
                               
                          </div>

                          <div class="col-md-8 form-group{{ $errors->first('email', ' has-error') }} has-feedback">
                              {!! Form::email('email',null, ['class'=>'form-control', 'placeholder'=>'Enter Email']) !!}
                              <span class="glyphicon glyphicon-envelope form-control-feedback input-img"></span>
                               
                          </div>

                          <div class="col-md-8  form-group{{ $errors->first('password', ' has-error') }} has-feedback">
                             {!! Form::password('password',['class'=>'form-control','placeholder'=> 'Enter Password']) !!}
                              <span class="glyphicon glyphicon-lock form-control-feedback input-img"></span>
                               
                          </div>

                          <div class="form-group alert alert-danger error-loc " style="display:none"></div>
                            <p>
                                  @if(Session::has('flash_alert_notice'))
                                  <div class="alert alert-danger danger">
                                       {{ Session::get('flash_alert_notice') }} 
                                  </div>
                                @endif
                              </p>
                          </div>
                          <div class="row">
                           <div class="col-md-3 form-group">
                               {!! Form::submit('Sign Up', ['class'=>'btn btn-primary btn-block btn-flat', 'id'=>'login', 'value'=>  Lang::get('admin-lang.sign_in') ]) !!}
                              </div>

                                <div class="col-xs-4">
                               <a href="{{url('admin')}}"> Already have account ?</a>
                            </div>
                          <!--   <button type="submit" class="btn btn-primary btn-block btn-flat">{{ Lang::get('admin-lang.sign_in') }}</button> -->
                          </div><!-- /.col -->
                          
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection