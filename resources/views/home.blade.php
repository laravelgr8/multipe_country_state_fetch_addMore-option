<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title></title>
<link rel="stylesheet" type="text/css" href="{{asset('css/bootstrap.min.css')}}">
<script type="text/javascript" src="{{asset('js/jquery.js')}}"></script>
<script type="text/javascript" src="{{asset('js/bootstrap.min.js')}}"></script>
<script type="text/javascript" src="{{asset('js/popper.min.js')}}"></script>
</head>
<body>
<div class="container">
    <div class="col-xl-12">
        <table class="table table-striped" id="myid">
            <tr>
                <td>
                    <select name="country" id="country0" class="form-control country" state-id="state0">
                        @foreach($country as $countrys)
                        <option value="{{$countrys->id}}">{{$countrys->country_name}}</option>
                        @endforeach
                    </select>
                </td>
                <td>
                    <select name="state" id="state0" class="form-control">
                        <option>Select any</option>
                    </select>
                </td>
                <td>
                    <button class="btn btn-info" id="add" >Add</button>
                </td>
            </tr>
        </table>
    </div>
</div>

<script type="text/javascript" src="{{asset('js/jquery.js')}}"></script>
<script>
    $(document).ready(function(){
        var i=0;
        $("#add").click(function(e){
            e.preventDefault();
            i++;
            $.ajax({
                url : 'fetchcountry',
                type:'GET',
                success:function(data)
                {
                    var html=data; //jo vi controller se option me aa raha hai usko ek variable me store kiya hu. taki jaha v append karna ho varible ko call kar lenge
                    // console.log(html);
                    $("#myid").append('<tr><td><select name="country" id="country'+i+'" class="form-control country" state-id="state'+i+'">"'+html+'"</select></td><td><select name="state" id="state'+i+'" class="form-control"><option>Select any</option></select></td><td><button class="btn btn-danger remove" id="add" >X</button></td></tr>');
                }
            });
        });


        $(document).on("change",'.country',function(){
            var state_id=$(this).attr('state-id');
            var c_id=$(this).val();
            $.ajax({
                url : 'fetchstate',
                type: 'GET',
                data:{countryID:c_id},
                success:function(data)
                {
                    // console.log(data);
                    $("#"+state_id).empty();
                    $("#"+state_id).append(data);
                }
            });
        });
    });
</script>
</body>
</html>