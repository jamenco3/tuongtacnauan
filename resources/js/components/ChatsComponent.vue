<template>
    <div class="row">
        <div class="col-md-8">
            <div class="card card-defalut">
                <div class="card-header">
                    Hỗ trợ nấu ăn tương tác
                </div>
                <div class="card-body p-0">
                    <ul class="list-unstyle" style="height:300px; overflow-y:scroll; font-size: 14px">
                        <li class="p-2" v-for="(message,index) in messages" :key="index">
<!--                            <span v-if="message.user">-->
<!--                            <strong v-if="message.user.name">{{ message.user.name}}</strong>-->
<!--                            </span>:-->
<!--                            {{message.message}}-->
                            <strong>{{message.user.name}}</strong> :
                            {{message.message}} <br>
                            <span class="pull-right">{{message.created_at}}</span>
                        </li>
                    </ul>
                </div>
                <input style="height:45px" type="text" class="form-control" name="message" placeholder="Input the message" v-model="newMessage" @keyup.enter="sendMessage">
            </div>
            <span class="text-muted p-0">User is typing...</span>
        </div>
        <div class="col-md-4">
            <div class="card card-defalut">
                <div class="card-header">
                    Hoạt động
                </div>
                <div class="card-body">
                    <ul style="font-size: 16px">
                        <li class="py-2" v-for="(user,index) in users" :key="index">
                           {{user.name}}
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        props:['user'],

        data(){
            return{
                messages: [],
                newMessage: '',
                users: [],
            }
        },
        created(){
            this.fetchMessages();

            Echo.join('chat')
                .here(user=>{
                    this.users = user;
                })
                .joining(user =>{
                    this.users.push(user);
                })
                .leaving(user=>{
                    this.users= this.users.filter(u=>u.id != user.id);
                })
                .listen('MessageEvent', (event) => {
                this.messages.push(event.message);
                // console.log("Nội dung")
                // console.log(this.messages)
            });
        },
        methods: {
            fetchMessages(){
                axios.get('messages').then(response => {
                    this.messages = response.data;
                    // console.log("Nội dung")
                     //console.log(this.messages)
                });
            },
            sendMessage(){
                this.messages.push({
                    user: this.user,
                    message:this.newMessage
                });

                axios.post('messages',{message: this.newMessage});
                this.newMessage="";
            }
        }
    }
</script>
