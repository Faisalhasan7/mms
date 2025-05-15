<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>File Upload Testing....</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>

<div class="container">
    <div class="row">
        <div class="card">
            <div class="card-header">
                <h1>File Upload Testing</h1>
            </div>
            <div class="card-body">
                <button class="btn btn-primary addBtn">Add</button>
                <table class="table table-striped table-info">
                    <thead>
                    <tr>
                        <th>SL</th>
                        <th>Total File Size</th>
                        <th>Complete</th>
                        <th>Upload</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody class="inputFileList">

                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
@vite(['resources/css/app.css', 'resources/js/app.js'])
<script>


    $('.addBtn').on('click',function () {
        let newTableRow=
            "<tr>"+
            "<td><input class=' fileInput form-control' type='file'></td>"+
            "<td class='fileSize'>File Size </td>"+
            "<td class='fileUpMB'>MB</td>"+
            "<td class='fileUpPercentage'>%</td>"+
            "<td class='fileStatus'>Status</td>"+
            "<td><button class='btn cancelBtn btn-danger  btn-sm'>Cancel</button><button  class='btn upBtn btn-primary btn-sm'>Upload</button></td>"+
            "</tr>";

        $('.inputFileList').append(newTableRow);

        $('.fileInput').on('change',function () {
            let MyFile= $(this).prop('files');
            let MyFileSize=((MyFile[0].size)/(1024*1024)).toFixed(2);
            $(this).closest('tr').find('.fileSize').html(MyFileSize+ "MB")
        })


        $('.upBtn').on('click',function (event) {
            let MyFile=$(this).closest('tr').find('.fileInput').prop('files')
            let fileUpMB=$(this).closest('tr').find('.fileUpMB');
            let fileUpPercentage=$(this).closest('tr').find('.fileUpPercentage');
            let fileStatus=$(this).closest('tr').find('.fileStatus');
            let Upbtn=$(this);

            let fromData=new FormData();
            fromData.append('uploadFile',MyFile[0])
            OnFileUpload(fromData,fileUpMB,fileUpPercentage,fileStatus,Upbtn);
            event.preventDefault();
            event.stopImmediatePropagation();
        })

        //Remove Row
        $('.cancelBtn').on('click',function () {
            $(this).parents('tr').remove();
        })

    })



    function OnFileUpload(fromData,fileUpMB,fileUpPercentage,fileStatus,Upbtn) {
        fileStatus.html("Uploading...");
        Upbtn.prop('disabled',true)

        let url='/fileUp';
        let config={
            headers:{'content-type':'multipart/form-data'},
            onUploadProgress:function (progressEvent) {
                let UpMB= (progressEvent.loaded/(1024*1024)).toFixed(2) +" MB";
                let UpPer= ((progressEvent.loaded*100)/progressEvent.total).toFixed(2) +" %";
                fileUpMB.html(UpMB)
                fileUpPercentage.html(UpPer)
            }
        }
        axios.post(url,fromData,config)
            .then(function (response) {
                if(response.status==200){
                    fileStatus.html('Success')
                    Upbtn.prop('disabled',false)
                }
                else{
                    fileStatus.html('Fail')
                    Upbtn.prop('disabled',false)
                }

            }).catch(function (error) {
            fileStatus.html('Fail')
            Upbtn.prop('disabled',false)
        })

    }
</script>
</body>
</html>
