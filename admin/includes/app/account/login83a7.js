app.controller('login',function($scope,$http){var sp=$scope;sp.init=function(){sp.isOTP=false;sp.tokenLogin="";sp.getCaptcha();}
sp.login=function(){var username=$('#UserName').val();var password=$('#Password').val();var captcha=$('#Captcha').val();var privateKey=$('#PrivateKey').val();if(!username||!password){showMessageLogin("Vui lòng nhập đầy đủ thông tin đăng nhập!");return;}
if(!captcha){showMessageLogin("Vui lòng nhập mã xác nhận!");return;}
if(!privateKey){showMessageLogin("Vui lòng làm mới trang để đăng nhập lại!");return;}
util.addLoadingAnimate();$http({method:'POST',url:config.url+'/api/AccountAPI/Login',params:{Username:username,Password:password,Captcha:captcha,PrivateKey:privateKey},withCredentials:true,}).then(function(response){if(response.data.ResponseCode==1){var url=window.location.href;var position=url.indexOf("/",url.indexOf("/")+2);var domain=url.slice(0,position);window.location.replace(domain+'/Dash/Index')}
else if(response.data.ResponseCode==100){sp.messageLogin=response.data.Message;$('#messageLogin').show();sp.tokenLogin=response.data.Token;if(sp.tokenLogin)
sp.isOTP=true;}
else{showMessageLogin(response.data.Message);sp.getCaptcha();}
util.removeLoadingAnimate();},function(data){util.removeLoadingAnimate();});}
sp.backToNormalLogin=function(){sp.isOTP=false;sp.tokenLogin="";sp.messageLogin="";}
sp.login2Step=function(){var otp=$('#OTP').val();if(!otp){showMessageLogin("Vui lòng nhập mã xác nhận !");return;}
if(!sp.tokenLogin){showMessageLogin("Phiên đăng nhập đã hết hạn, vui lòng thử lại !");sp.backToNormalLogin();return;}
$http({method:'POST',url:config.url+'/api/AccountAPI/Login2Step',params:{token:sp.tokenLogin,otp:otp,},withCredentials:true,}).then(function(response){if(response.data.ResponseCode==1){var url=window.location.href;var position=url.indexOf("/",url.indexOf("/")+2);var domain=url.slice(0,position);window.location.replace(domain+'/Dash/Index')}
else{showMessageLogin(response.data.Message);}},function(data){});}
sp.getCaptcha=function(){$('#Captcha').val('');$http({method:'GET',url:config.url+'api/AccountAPI/Captcha',withCredentials:true,}).then(function(response){if(response.data.ResponseCode==1){sp.captchaKey=response.data.Data[0];sp.captchaData="data:image/png;base64, "+response.data.Data[1];}
else{showMessageLogin(response.data.Message);}},function(data){});}
function showMessageLogin(msg){sp.messageLogin=msg;$('#messageLogin').show();setTimeout(function(){$('#messageLogin').fadeOut('slow');},5000);}});