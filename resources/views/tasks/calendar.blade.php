<script>
  var calendar = $("#calendar-view").fullCalendar({
  //ヘッダーの設定
  header: {
    left: "today month,agendaWeek,agendaDay",
    center: "title",
    right: "prev next"
  },
  editable: false, // イベントを編集するか
  allDaySlot: false, // 終日表示の枠を表示するか
  eventDurationEditable: false, // イベント期間をドラッグしで変更するかどうか
  slotEventOverlap: false, // イベントを重ねて表示するか
  selectable: true,
  selectHelper: true,
  droppable: false, // イベントをドラッグできるかどうか
	
  select: function(start, end, allDay) {
    //日の枠内を選択したときの処理;
        console.log('select eventClick');
        console.log(start.toISOString());
        console.log(end.toISOString());
       
  },
  eventClick: function(event, jsEvent, view) {
    //イベントをクリックしたときの処理;
        console.log('eventClick');
        console.log(event.title);
        console.log(event.start.toISOString());
        console.log(event.id);
        //$('#show_click').submit();
        var url = "{!! route('tasks.show',0) !!}";
        url = url + event.id;
        window.location.href = url;
  },
  timezone:'local',
  timeFormat: 'HH:mm',
  eventSources:[ 
		{
        	},
        ],
  events:[
     @foreach($tasks as $task)
      {
      title:"{{ $task->title }}",
      start:"{{ $task->start_date }}.{{$task->start_time }}",
      end:"{{ $task->end_date }}.{{ $task->end_time }}",
      id:"{{ $task->id }}",
  },
  @endforeach
   @foreach($shares as $share)
      {
      title:"{{ $share->title }}",
      start:"{{ $share->start_date}}.{{$share->start_time }}",
      end:"{{ $share->end_date }}.{{ $share->end_time }}",
      id:"{{ $share->id }}",
      backgroundColor:'green',
  },
  @endforeach
  ]
    });
  
</script>