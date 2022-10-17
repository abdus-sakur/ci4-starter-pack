$(document).ready(function () {
  $('.delete').click(function () {
    Swal.fire({
      title: 'Yakin hapus?',
      text: 'Data akan dihapus secara permanen',
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Ya',
      cancelButtonText: 'Tidak',
    }).then((result) => {
      if (result.isConfirmed) {
        $.ajax({
          method: 'POST',
          url: $(this).data('url'),
          data: {
            _method: 'DELETE',
            id: $(this).data('id'),
            [csrfName]: csrfHash,
          },
        }).done(function (msg) {
          Swal.fire('Deleted!', 'Data sudah dihapus.', 'success').then(function () {
            location.reload()
          })
        })
      }
    })
  })
})
