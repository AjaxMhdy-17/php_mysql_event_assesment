<footer class="py-5" style="background: #e1e5ea; text-align:center ; border-radius:30px ; margin-top : 30px ">
    <p>&copy; <?= date('Y'); ?> Event Management. All rights reserved.</p>
</footer>
</main>

<script src="https://code.jquery.com/jquery-3.7.0.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
<script src="assets/js/registerFormValidation.js"></script>
<script src="assets/js/loginFormValidation.js"></script>
<script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.4/js/dataTables.bootstrap5.min.js"></script>


<script>
    const today = new Date();
    const formattedDate = today.toISOString().split('T')[0];
    const eventStartDate = document.getElementById('event_start_date');
    const eventEndDate = document.getElementById('event_end_date');

    if (eventStartDate != null) {
        eventStartDate.value = formattedDate;
        eventEndDate.value = formattedDate;
    }
    $(document).ready(function() {
        $('#myTable').DataTable({
            "pageLength": 3,
            "lengthMenu": [3, 6, 9, 15, 21]
        });
    });

    function confirmDelete(eventId) {
        if (confirm("Are you sure you want to delete this event?")) {
            document.getElementById('delete-form-' + eventId).submit();
        }
    }
</script>


<!-- <script>
    $(document).ready(function() {
        $('#eventsTable').DataTable({
            "processing": true,
            "serverSide": true,
            "ajax": {
                "url": "/ollyo/public/index.php?page=my-event-data",
                "type": "POST",
                "data": function(d) {
                    d.draw = d.draw || 1;
                }
            },
            "columns": [{
                    "data": "0"
                },
                {
                    "data": "1"
                },
                {
                    "data": "2"
                }
            ]
        });
    });
</script> -->


</body>

</html>