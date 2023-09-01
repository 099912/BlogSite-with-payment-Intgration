const messageElement=document.getElementById("messageOutput ");
const userMessageInput=document.getElementById("message");
const sendMesageForm=document.getElementById("chat_form");

let url=window.location;
let urlNew=new URL(url);
let userName=urlNew.searchParams.get('name');

sendMesageForm.addEventListener("submit",function(e){
e.preventDefault();

if(userMessageInput!=''){
    axios({
    method:'post',
    url:'/admin/send/chat',
    data:{

        username:userName,
        message:userMessageInput.value
    }
})

}

window.SpeechRecognitionAlternative.channel('chat')
.listen('.chating',(res) =>{
conosle.log(res);
})

})
