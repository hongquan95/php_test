document.addEventListener("DOMContentLoaded", function () {
    const COLOR = {
        1: '#28a745',
        2: '#ffc107',
        3: '#007bff',
    };
    var calendarEl = document.getElementById("calendar");

    var calendar = new FullCalendar.Calendar(calendarEl, {
        plugins: ["interaction", "dayGrid"],
        header: {
            left: "prevYear,prev,next,nextYear today",
            center: "title",
            right: "dayGridMonth,dayGridWeek,dayGridDay"
        },
        navLinks: true, // can click day/week names to navigate views
        editable: true,
        eventLimit: true, // allow "more" link when too many events
        eventTextColor: '#fff',
        events: function(time, callback) {
            $.ajax({
                url: '/api/tasks',
                data: {
                    start: time.startStr,
                    end:time.endStr,
                },
                success: function(res) {
                    var data = res.data.map(ele => {
                        return {
                            id: ele.id,
                            title: ele.name,
                            start: ele.start_date,
                            end: ele.end_date,
                            color: COLOR[ele.status],
                        };
                    });
                    callback(data);
                }
            });
        }
    });

    calendar.render();
});
