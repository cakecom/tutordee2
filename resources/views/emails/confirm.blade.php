@component('mail::message')
# คุณได้ส่งฟอร์มค้นหาติวเตอร์แล้ว

คุณสามารถยกเลิกฟอร์มของคุณได้ผ่านลิ้งค์ข้างล่าง
โปรดอย่าส่ง url นี้ให้ผู้อื่นทราบ

@component('mail::button', ['url' => 'url("test")'])
Button Text
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
