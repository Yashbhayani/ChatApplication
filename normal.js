var form = document.querySelector('.typing-area'),
        inputField = form.querySelector('.input-field'),
        sendbtn = form.querySelector('#button1'),
        chatBox = document.querySelector(".messanger-list");

        form.onsubmit = (e) => {
            e.preventDefault(); 
               }

        sendbtn.onclick = () => {
            let xhr = new XMLHttpRequest();
            xhr.open("POST", "services.php", true);
            xhr.onload = () => {
                if(xhr.readyState === XMLHttpRequest.DONE){
                    if(xhr.status === 200){
                       inputField.value="";
                    }
                }
            }

            let formData = new FormData(form);
            xhr.send(formData);
        }

        setInterval(()=>{
            let xhr = new XMLHttpRequest();
            xhr.open("POST", "getchat.php", true);
            xhr.onload = () => {
                if(xhr.readyState === XMLHttpRequest.DONE){
                    if(xhr.status === 200){
                        let data = xhr.response;
                        if(!searchBar.ClassList.contains("active")){
                            userList.innerHTML = data;
                        }
                    }
                }
                
            }
            let formData = new FormData(form);
            xhr.send(formData);
        }, 500);