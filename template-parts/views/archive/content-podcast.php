<div class="flex flex-col w-full min-h-screen py-24">
	<div class="w-full max-w-[1360px] mx-auto min-h-screen xl:pt-20 space-y-20">
		<div class="w-full max-w-4xl space-y-10 mx-auto">
			<h1 class="lg:text-5xl text-[#3D9E26] font-bold text-center">OUR PROGRAMS</h1>
			<p class="text-center text-base">Sharing is caring! While we share our expertise to your brand and business, we also love to share our care, knowledge and story to the community, to the people and neighborhood we live in.</p>
		</div>

		<div class="grid grid-cols-2 xl:gap-20 justify-between pb-10">
			<div class="col-span-1 min-h-[420px] bg-gray-200 rounded-xl">
				<div class="w-full h-full rounded-xl relative overflow-hidden">

					<img src="http://localhost/core-wordpress/wp-content/uploads/2022/04/Screenshot_332-300x201.png" alt="image-our-program"
						 class="w-full h-full absolute top-1/2 left-1/2 transform -translate-x-2/4 -translate-y-2/4 object-cover">
				</div>
			</div>
			<div class="col-span-1 rounded-xl h-full flex items-center">
				<div class="w-full flex flex-col space-y-12">
					<div class="w-[300px] h-[100px] rounded-xl bg-gray-300"></div>
					<div class="xl:w-3/4">
						<p>Rebound Podcast is a bi-weekly casual talk that not only reveals the insight and trend in digital but also quirky sides of digital life and challenging agency life.</p>
					</div>
					<div class="w-full block relative">
						<button class="xl:px-10 py-4 bg-[#3D9E26] shadow-lg rounded-full text-white font-semibold">Listen on Spotify</button>
					</div>
				</div>
			</div>

		</div>

		<div class="block relative xl:space-y-10 pb-20">
			<div class="w-full">
				<h2 class="lg:text-3xl text-[#3D9E26] font-extrabold text-center">OUR MOST LISTENED PODCASTS</h2>
			</div>
			<div class="w-full grid grid-cols-4 xl:gap-6">
				<?php
				for($i = 0; $i < 4; $i++):
				?>
					<div class="col-span-1 w-full min-h-[320px] rounded-xl space-y-6">
						<div class="w-full min-h-[280px] bg-red-500 rounded-xl overflow-hidden relative">
							<img src="http://localhost/core-wordpress/wp-content/uploads/2022/04/Screenshot_331-150x150.png" alt="img-list-podcast"
							class="w-full h-full absolute top-1/2 left-1/2 transform -translate-x-2/4 -translate-y-2/4 object-cover">
						</div>
						<div class="w-full flex items-center justify-center relative px-6">
							<button class="w-full py-4 bg-[#3D9E26] shadow-lg rounded-full text-white font-semibold">Listen on Spotify</button>
						</div>
					</div>
				<?php endfor; ?>
			</div>
		</div>

		<?= get_template_part(
				'template-parts/components/section/section',
				'default-podcast',
				[
						"classes"=> [
							"card"=>"grid grid-cols-12 xl:gap-20 justify-between pb-10",
							"section-1"=> "col-span-7 min-h-[420px] bg-gray-200 rounded-xl",
							"section-2"=> "col-span-5 pr-10"
						],
						"position"=> "right",
						"data"=> [
								"with_icon" => false,
								"images" => "http://localhost/core-wordpress/wp-content/uploads/2022/04/Screenshot_333-300x192.png",
								"icon" => null,
								"title" => "REBOUND TALK",
								"title_classes"=> "text-6xl font-extrabold text-[#3D9E26] leading-tight",
								"description_classes"=> "w-full",
								"description" => "Get updates about the digital marketing world and the know-how through in-depth discussions with experts.", //Lorem ipsum dolor sit amet
								"btn_url" => "/",
								"btn_text" => "Watch on YouTube"
						]
				]
		); ?>


	</div>
</div>
