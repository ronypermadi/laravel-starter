<div class="section-body">

    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-4">
                <div class="card card-primary">
                    <div class="card-header">
                        <div class="card-header-form">
                            <div class="input-group">
                                <input type="text" id="autocomplete_searchMessage" name="search" class="form-control" placeholder="Search">
                                <div class="input-group-btn">
                                    <button class="btn btn-primary btn-icon" data-toggle="modal" data-target="#scrollable-modal"><i class="fa fa-address-card"></i></button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-body" id="top-5-scroll">
                      <ul class="list-unstyled list-unstyled-border">
                          <li class="media">
                              <img alt="image" class="mr-3 rounded-circle" width="50" src="{{asset('img/Logo.png')}}">
                              <div class="media-body">
                                <div class="mt-0 mb-1 font-weight-bold"><i class="fas fa-circle text-success mr-2" title="Online" data-toggle="tooltip"></i> Hasan Basri</div>
                                <div class="text-small font-600-bold">
                                  Lorem ipsum dolor sit amet, consectetur adipisicing elit. </div>
                              </div>
                          </li>
                          <li class="media">
                            <img alt="image" class="mr-3 rounded-circle" width="50" src="{{asset('img/Logo.png')}}">
                            <div class="media-body">
                              <div class="mt-0 mb-1 font-weight-bold"><i class="fas fa-circle text-danger mr-2" title="Offline" data-toggle="tooltip"></i> Hasan Basri</div>
                              <div class="text-small font-600-bold">
                                Lorem ipsum dolor sit amet, consectetur adipisicing elit. </div>
                            </div>
                        </li>
                      </ul>
                    </div>
                </div>
            </div>
            <div class="col-lg-8">
                <div class="card chat-box card-success" id="mychatbox">
                    <div class="card-header">
                        <h4><i class="fas fa-circle text-success mr-2" title="Online" data-toggle="tooltip"></i> Chat
                            with Rizal</h4>
                          {{-- <div class="input-group-btn" style="float: right">
                              <a data-dismiss="#mychatbox" class="btn btn-icon float-right btn-danger" href="#"><i class="fas fa-times"></i></a>
                          </div> --}}
                    </div>
                    <div class="card-body chat-content">
                      {{$getMessages}}
                    </div>
                    <div class="card-footer chat-form">
                      <form id="chat-form">
                        <input type="text" class="form-control" placeholder="Type a message">
                        <button class="btn btn-primary">
                          <i class="far fa-paper-plane"></i>
                        </button>
                      </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
</div>


<script>
document.addEventListener('livewire:load', function () {
        listUser();
        function listUser(){
            $.ajax({
                type:'get',
                url:'{{route('listUser')}}',
                datatype:'html',
                success:function(response){
                  //    console.log(response);
                    $('.listUser').html(response);
                    }
                });
        }
        $('#autocomplete_searchUser').on('keyup',function() {
            var query = $(this).val(); 
            $.ajax({
                url:"{{ route('autocomplete_searchUser') }}",
                type:"GET",
                data:{'autocomplete_searchUser':query},
                success:function (data) {
                    $('.listUser').html(data);
                }
            })
        });

        var chats = [
          {
            text: 'Hello?!',
            position: 'right'
          },
          {
            typing: 1,
            position: 'left'
          }
        ];
      for(var i = 0; i < chats.length; i++) {
        var type = 'text';
        if(chats[i].typing != undefined) type = 'typing';
        $.chatCtrl('#mychatbox', {
          text: (chats[i].text != undefined ? chats[i].text : ''),
          picture: (chats[i].position == 'left' ? '{{asset('img/Logo.png')}}' : '{{asset('img/Logo.png')}}'),
          position: 'chat-'+chats[i].position,
          type: type
        });
      }

      $("#chat-form").submit(function() {
        var me = $(this);

        if(me.find('input').val().trim().length > 0) {
              $.chatCtrl('#mychatbox', {
              text: me.find('input').val(),
              picture: '{{asset('img/Logo.png')}}',
              });
              me.find('input').val('');
          }
          return false;
      });
    })
</script>