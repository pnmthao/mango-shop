@extends('master')
@section('content') 
@include('../header') 
	<!-- page -->
	<div class="services-breadcrumb">
		<div class="agile_inner_breadcrumb">
			<div class="container">
				<ul class="w3_short">
					<li>
						<a href="{{route('trang-chu')}}">Home</a>
						<i>|</i>
					</li>
					<li>Hỏi đáp</li>
				</ul>
			</div>
		</div>
	</div>
	<!-- //page -->
	<!-- FAQ-help-page -->
	<div class="faqs-w3l">
		<div class="container">
			<!-- tittle heading -->
			<h3 class="tittle-w3l">Hỏi đáp
				<span class="heading-style">
					<i></i>
					<i></i>
					<i></i>
				</span>
			</h3>
			<!-- //tittle heading -->
			<h3 class="w3-head">CÁC CÂU HỎI THƯỜNG GẶP</h3>
			<div class="faq-w3agile">
				<ul class="faq">
					<li class="item1">
						<a href="#" title="click here">Cấu trúc website thương mại cần phải có các trang nào ?</a>
						<ul>
							<li class="subitem1">
								<p> Ngày nay, mọi việc kinh doanh đều cần website. Nhưng có nhiều website lại chứa quá nhiều trang không thật sự cần thiết, vì trên thực tế bạn chỉ cần đủ trang là được, nhiều quá sẽ rất khó chuyển hưởng. Hơn nữa, có nhiều trang web trong một website cũng đồng nghĩa với việc lãng phí thời gian dựng trang mà không ai truy cập vào.</p>
							</li>
						</ul>
					</li>
					<li class="item2">
						<a href="#" title="click here">Vì sao bạn cần cấu trúc website một cách cẩn thận ?</a>
						<ul>
							<li class="subitem1">
								<p> Nếu bạn thường em qua các website kinh doanh, bạn sẽ thấy rất nhiều trong số chúng chứa vô vàn các thông tin phụ. Ví dụ, một website kinh doanh nội thất cho khách hàng trong khu vực sẽ không cần đến một trang web hỗ trợ trực tuyến làm gì.</p>
							</li>
						</ul>
					</li>
					<li class="item3">
						<a href="#" title="click here">Các loại trang (web page) mà bạn có sử dụng để cấu trúc website kinh doanh WordPress ?</a>
						<ul>
							<li class="subitem1">
								<p>Có lẽ câu hỏi thường gặp nhất trong khi kinh doanh là: “Nó tốn bao nhiêu tiền?”. Đối với những công ty cung cấp sản phẩm hay dịch vụ với giá cụ thể, thì lại càng dễ để đăng bảng giá bán hơn.
									Nếu bạn đang kinh doanh những sản phẩm này thì may rồi đó, bạn chỉ việc tạo một trang riêng để chứa thông tin chi phí. Bạn còn có thể thêm các thông tin khác như về các dịch vụ cộng thêm, khuyến mãi tại đây mà không khiến website bị phân mảng.</p>
							</li>
						</ul>
					</li>
					<li class="item4">
						<a href="#" title="click here">Điều khoản dịch vụ ?</a>
						<ul>
							<li class="subitem1">
								<p>Cuối cùng, nếu bạn đang cung cấp bất kỳ loại hình dịch vụ nào qua website của bạn, vậy bạn cần tạo một trang web Terms of Service (Điều khoản dịch vụ) trong cấu trúc website của bạn. Trang này sẽ trình bày ra các thông tin quan trọng về dịch vụ.</p>
							</li>
						</ul>
					</li>
					<li class="item5">
						<a href="#" title="click here">Xem qua các trang web ?</a>
						<ul>
							<li class="subitem1">
								<p>Giờ, hãy xem qua 7 loại web page phổ biến và có thể rất quan trọng với site đang kinh doanh nhé. Đối với từng loại, chúng tôi sẽ đưa ra ví dụ, giải thích rõ nội dung của nó là gì, và lý giải có cần thiết sử dụng nó không và khi nào. Bạn sẽ có thể tận dụng một số trong các trang này để hoàn thiện website tổng thể của bạn.</p>
							</li>
						</ul>
					</li>
					<li class="item6">
						<a href="#" title="click here">Trang Liên hệ ?</a>
						<ul>
							<li class="subitem1">
								<p>Web Page Liên Hệ Chúng Tôi (Contact Us) thì cần sự trực quan. Thường nó sẽ có một contact form để khách truy cập có thể gửi truy vấn trực tiếp.
									Ngoài ra, bạn sẽ cần cân nhắc thêm một số cách liên hệ khác ngoài form mẫu. Ít nhất là bạn nên thêm địa chỉ email address kinh doanh của bạn và số điện thoại vào. Bạn còn có thể tạo số điện thoại dạng click, để khách có thể nhấn vào là gọi được bạn ngay.		
									Nếu doanh nghiệp của bạn có địa chỉ vật lý, vậy trang Liên Hệ Chúng Tôi cũng là nơi tốt nhất để đặt một bản đồ hiển thị vị trí của bạn. Bạn có thể sử dụng dịch vụ Google Maps để làm, bằng cách nhúng bản đồ trực tiếp lên website và làm nổi bật vị trí được chỉ định. Việc này cũng giúp khách truy cập dễ tìm đến bạn hơn.
									Trong nhiều trường hợp, trang web Liên hệ Chúng tôi cũng có thể kết hợp với mục “Cách tìm thấy chúng tôi”. Yếu tố này nhiều khi rất quan trọng, vì mọi người biết là bạn sẵn sàng tiếp họ và có nhiều cách khác nhau để liên hệ.</p>
							</li>
						</ul>
					</li>
					<li class="item7">
						<a href="#" title="click here">Trang giới thiệu ?</a>
						<ul>
							<li class="subitem1">
								<p>Trong nhiều trường hợp, mọi người sẽ không biết chính xác bạn việc kinh doanh của bạn là gì và bạn là ai. Hãy thử tưởng tượng, họ đang tìm kiếm một luật sư trong khu vực. Bước đầu tiên chắc chắn họ sẽ sử dụng Google nếu chưa có ai giới thiệu.
									Với công cụ tìm kiếm, họ sẽ nhanh chóng có nhiều lựa chọn. Nhiều đến nỗi trên thực tế họ chỉ quan tâm đến những site nào chuyên nghiệp nhất. Còn gì nữa ta, à, mọi người sẽ cảm thấy thoải mái hơn khi thấy một luật sư thân thiện, với nụ cười thường trực chắc chắn, và vài thông tin cá nhân của anh/cô ấy nữa trên website.									
									Kể cả nếu bạn đang vận hành một việc kinh doanh cực lớn, chúng tôi vẫn khuyên bạn nên cá nhân hóa trang này bằng cách đặt một vài gương mặt đại diện để thể hiện bạn là ai. Trang “Về Chúng Tôi” và trang “Đội Ngũ Công Ty” sẽ là nơi bạn đem lại sự cá nhân hóa, khiến cho khách truy cập có khái niệm, hình dung được công ty của bạn là gì và câu chuyện làm thế nào bạn trở thành như bây giờ.									
									Ngoài ra, hiệu ứng ảnh gương mặt người trên website sẽ tăng tỉ lệ chuyển đổi, vì nó là tăng độ tin cậy của website lên, do cảm giác của yếu tố con người mang lại sẽ “thực” hơn là một wesbite công ty không có bất kỳ gương mặt người nào.</p>
							</li>
						</ul>
					</li>
					<li class="item8">
						<a href="#" title="click here">Các câu hỏi thường gặp (Frequenly Asked Questions, viết tắt FAQ)	?</a>
						<ul>
							<li class="subitem1">
								<p>Nhiều website cũng hưởng lợi từ trang FAQ của họ, vì nó còn giúp khách truy cập nán lại website lâu hơn. Tùy vào kích thước của việc kinh doanh của bạn và loại dịch vụ, bạn có thể tiến xa hơn nữa bằng cách tạo ra một web app về cơ sở kiến thức.</p>
							</li>
						</ul>
					</li>
					<li class="item9">
						<a href="#" title="click here">Hỗ trợ ?</a>
						<ul>
							<li class="subitem1">
								<p>Nếu bạn đang kinh doanh cần hỗ trợ khách hàng thường xuyên, bạn sẽ cần trang riêng cho mục đích này. Một trang FAQ đơn thuần sẽ không thể nào thay thế được việc này. Vì mọi người sẽ tìm kiếm thông tin hỗ trợ trước tiên. Nếu họ không biết là donah nghiệp của bạn có hỗ trợ, hay không tìm thấy thông tin đáng giá trong FAQ, họ sẽ bỏ qua sản phẩm của bạn. Vì bất kỳ ai cũng thích được hỗ trợ trực tiếp.</p>
							</li>
						</ul>
					</li>
					<li class="item10">
						<a href="#" title="click here">Chính sách riêng tư	?</a>
						<ul>
							<li class="subitem1">
								<p>Hiện nay, mọi người rất xem trong về quyền riêng tư trên mạng. Có nghĩa là nếu công ty của bạn có thu thập bất kỳ loại dữ liệu nào từ khách hàng, bạn cũng cần phải thiết lập trang chính sách riêng tư để bạn cho họ biết bạn sử dụng ra sao.</p>
							</li>
						</ul>
					</li>
				</ul>
			</div>
		</div>
	</div>
	<!-- //FAQ-help-page -->
@include('../footer')
@endsection