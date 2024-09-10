//curosos
function searchId(newId) {

    txtIdMessage = document.getElementById("idMessage");
    txtNewId = document.getElementById("id");
    btnSaveStudent = document.getElementById("sendCourseData");

    if (newId.length == 0) {
        txtNewId.innerHTML = "";
        txtIdMessage.innerHTML = "";
        btnSaveStudent.disabled = true;
        return;
    } else {
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function () {
            if (this.readyState == 4 && this.status == 200) {
                response = JSON.parse(this.responseText);

                if (response.success) {
                    txtIdMessage.classList.add("warning");
                    txtIdMessage.classList.remove("success");
                    btnSaveStudent.disabled = true;
                } else {
                    txtIdMessage.classList.add("success");
                    txtIdMessage.classList.remove("warning");
                    btnSaveStudent.disabled = false;
                }
                txtIdMessage.innerHTML = response.message;
            }
        };
        xmlhttp.open("GET", "backend/searchNewId.php?newId=" + newId, true);
        xmlhttp.send();
    }

}

function sendData() {
    newId = document.getElementById("id").value;
    cname = document.getElementById("cname").value;
    description = document.getElementById("description").value;
    type = document.getElementById("type").value;

    var data = {id: newId, cname: cname, description: description, type: type};
    console.log(data);
    mdlMessage = document.getElementById("messageModal");

    txtmdlMessage = document.getElementById("mdlMessage");
    txtmdlSuccess = document.getElementById("mdlSuccess");

    var xmlhttp = new XMLHttpRequest();

    xmlhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            console.log(this.responseText);
            response = JSON.parse(this.responseText);

            txtmdlSuccess.value = response.success;
            txtmdlMessage.innerHTML = response.message;
        }
    };
    xmlhttp.open("POST", "processC.php", true);
    xmlhttp.setRequestHeader("Content-Type", "application/json");
    xmlhttp.send(JSON.stringify(data));
}

function cleanData() {
    mdlSuccess = document.getElementById("mdlSuccess").value;
    type = document.getElementById("type").value;
    console.log(type);
    if (type == "7") {
        if (mdlSuccess == "true") {
            document.getElementById("idMessage").innerHTML = "";
            document.getElementById("id").value = "";
            document.getElementById("cname").value = "";
            document.getElementById("description").value = "";
        }
    } else {
        location.href = "readC.php";
    }
}

