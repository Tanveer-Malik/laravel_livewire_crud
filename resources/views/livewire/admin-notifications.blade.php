<div class="position-fixed top-0 end-0 p-3" style="z-index: 1050;">
    {{-- @dd($notifications); --}}
    @foreach($notifications as $notification)
        <div class="alert alert-info alert-dismissible fade show" role="alert">
            {{ $notification }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endforeach
</div>

{{-- <script>
    document.addEventListener('DOMContentLoaded', function () {
        Echo.channel('admin-notifications')
            .listen('.customer.created', (e) => {
                Livewire.emit('customerCreated', e.customer);
            });

        window.addEventListener('remove-toast', function () {
            setTimeout(() => {
                document.querySelectorAll('.alert').forEach(alert => alert.remove());
            }, 5000);
        });
    });
</script> --}}
<script src="https://js.pusher.com/7.2/pusher.min.js"></script>
<script>
    const pusher  = new Pusher('c585b27c74c41c06e3b7', {cluster: 'ap2'});
  const channel = pusher.subscribe('public');

  //Receive messages
  channel.bind('chat', function (data) {
    $.post("/receive", {
      _token:  '{{csrf_token()}}',
      message: data.message,
    })
     .done(function (res) {
       $(".messages > .message").last().after(res);
       $(document).scrollTop($(document).height());
 });
 });
</script>

