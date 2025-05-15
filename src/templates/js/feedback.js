function storeFeedback(name, feedback){
  const form = new FormData();
  form.append('name', name);
  form.append('feedback', feedback);

  fetch('storefeedback.php', {
      method: 'POST',
      body: form
  })
  .then(response => {
      if (!response.ok) {
        throw new Error('Server error: ' + response.status);
      }
      return response.text(); // hoặc .json() nếu bạn trả JSON từ PHP
    })
    .then(data => {
      console.log('Feedback sent successfully:', data);
    })
    .catch(error => {
      console.error('Failed to send feedback:', error);
      alert('❌ Gửi phản hồi thất bại. Vui lòng thử lại sau.');
    });
}

document.getElementById('feedback-form').addEventListener('submit', function (e) {
  e.preventDefault();

  const name = document.getElementById('name').value;
  const feedback = document.getElementById('feedback').value;
  storeFeedback(name, feedback);

  alert("Thank you for your feedback!");

  const modalElement = document.getElementById('feedbackModal');
  const modalInstance = bootstrap.Modal.getOrCreateInstance(modalElement);

  modalInstance.hide();

  modalElement.addEventListener('hidden.bs.modal', function onHidden() {
    // Gỡ các hiệu ứng còn sót lại
    document.querySelectorAll('.modal-backdrop').forEach(el => el.remove());
    document.body.classList.remove('modal-open');
    document.body.style.removeProperty('padding-right'); // nếu Bootstrap thêm padding
    document.body.style.removeProperty('overflow'); // thêm dòng này nếu vẫn không cuộn được

    modalElement.removeEventListener('hidden.bs.modal', onHidden); // cleanup
  });

  this.reset();
});
