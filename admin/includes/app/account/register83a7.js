app.controller('register',function($scope,$http){var sp=$scope;sp.init=function(){var refer=window.location.href;var n=refer.indexOf("referCode=");referCode=parseInt(refer.slice(n+10,refer.length));if(referCode>0){$("#ReferCode").val(referCode);$("#ReferCode").prop('disabled',true);}}
sp.register=function(){var username=$('#UserName').val();var password=$('#Password').val();var email=$('#Email').val();var confirmPass=$('#ConfirmPassword').val();var referCode=$('#ReferCode').val();var captchaGoogle=grecaptcha.getResponse();if(!captchaGoogle){alert("Captcha không chính xác, refresh trang để thử lại !");return;}
if(!referCode||isNaN(referCode))
referCode=0;if(!username||!password||!confirmPass||!email){showMessage("Vui lòng nhập đầy đủ thông tin đăng ký !");return;}
if(password!=confirmPass){showMessage("Nhập lại mật khẩu không chính xác!");return;}
if(!$('#termInput').is(":checked")){showMessage("Vui lòng đồng ý với 'Điều khoản bảo mật' !");return;}
$http({method:'POST',url:config.url+'/api/AccountAPI/Register',params:{Username:username,Password:password,ReferCode:referCode,Email:email,GoogleCaptcha:captchaGoogle},withCredentials:true,}).then(function(response){if(response.data.ResponseCode==1){var url=window.location.href;var position=url.indexOf("/",url.indexOf("/")+2);var domain=url.slice(0,position);window.location.replace(domain+'/Dash/Index')}
else{showMessage(response.data.Message);}},function(data){});}
function showMessage(msg){util.showNotification(msg,4);}});