class Notification {

    success(msg = "Successfully Done") {
        Toast.fire({
            icon: "success",
            title: msg,
        });
    }
    question(msg = "Are you sure"){
        Toast.fire({
            icon: "question",
            title: msg,
        });
    }
    error(msg = "Something went wrong !"){
        Toast.fire({
            icon: "error",
            title: msg,
        });
    }
    warning(msg = "Oops..! worng"){
        Toast.fire({
            icon: "warning",
            title: msg,
        });
    }
    image_validation(msg = "Upload image size less then 1mb"){
        Toast.fire({
            icon: "error",
            title: msg,
        })
    }
}

export default new Notification();