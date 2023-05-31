import React from 'react';
import BlogCard from './BlogCard';
const Blog = ({ blogData }) => {
	const faqbannerImg =
		'https://sealinkstravel.com/wp-content/uploads/2020/02/banner.jpg';
	return (
		<div className="blog-page">
			<img
				src={faqbannerImg}
				alt="main-banner"
				className="blog-banner banner"
			/>
			<h1 className="heading">Our Blog</h1>
			<div className="blog-cards-wrapper container">
				{blogData.map((item) => (
					<BlogCard blog={item} />
				))}
			</div>
		</div>
	);
};

export default Blog;

Blog.defaultProps = {
	blogData: [
		{
			id: 0,
			date: 'October 14, 2022',
			postedBy: 'Sealinks Holidays',
			title: '5 Major bad sim card symptoms you should know',
			image: 'https://i.ytimg.com/vi/A-j5fSRaMq8/hqdefault.jpg',
			discription:
				'You can start by typing “troubleshooting” into the Start screen, which opens the Troubleshooting program. You will see the default microphone, as well as volume levels for your speakers and microphone. If the blue bar jumps around while you talk, the microphone is working properly. You can then click “OK” to continue the process. The next step is to test your microphone. Reinstalling hardware means reinstalling the drivers. <br/> From inside the Device Manager window, expand the menus and look for the Sound drivers. Right-click the speaker icon on the Windows taskbar and then select Sound settings. You can also access this through the Windows 11 Settings app. Not all applications will be listed here, most of your desktop apps will have access to the microphone when you select ‘on’ in number 4 above. The microphone boost is an audio enhancement that is applied to the mic.',
		},
		{
			id: 1,
			date: 'October 14, 2022',
			postedBy: 'Sealinks Holidays',
			title: '5 Major bad sim card symptoms you should know',
			image: 'https://i.ytimg.com/vi/A-j5fSRaMq8/hqdefault.jpg',
			discription:
				'You can start by typing “troubleshooting” into the Start screen, which opens the Troubleshooting program. You will see the default microphone, as well as volume levels for your speakers and microphone. If the blue bar jumps around while you talk, the microphone is working properly. You can then click “OK” to continue the process. The next step is to test your microphone. Reinstalling hardware means reinstalling the drivers. <br/> From inside the Device Manager window, expand the menus and look for the Sound drivers. Right-click the speaker icon on the Windows taskbar and then select Sound settings. You can also access this through the Windows 11 Settings app. Not all applications will be listed here, most of your desktop apps will have access to the microphone when you select ‘on’ in number 4 above. The microphone boost is an audio enhancement that is applied to the mic.',
		},
		{
			id: 2,
			date: 'October 14, 2022',
			postedBy: 'Sealinks Holidays',
			title: '5 Major bad sim card symptoms you should know',
			image: 'https://i.ytimg.com/vi/A-j5fSRaMq8/hqdefault.jpg',
			discription:
				'You can start by typing “troubleshooting” into the Start screen, which opens the Troubleshooting program. You will see the default microphone, as well as volume levels for your speakers and microphone. If the blue bar jumps around while you talk, the microphone is working properly. You can then click “OK” to continue the process. The next step is to test your microphone. Reinstalling hardware means reinstalling the drivers. <br/> From inside the Device Manager window, expand the menus and look for the Sound drivers. Right-click the speaker icon on the Windows taskbar and then select Sound settings. You can also access this through the Windows 11 Settings app. Not all applications will be listed here, most of your desktop apps will have access to the microphone when you select ‘on’ in number 4 above. The microphone boost is an audio enhancement that is applied to the mic.',
		},
		{
			id: 3,
			date: 'October 14, 2022',
			postedBy: 'Sealinks Holidays',
			title: '5 Major bad sim card symptoms you should know',
			image: 'https://i.ytimg.com/vi/A-j5fSRaMq8/hqdefault.jpg',
			discription:
				'You can start by typing “troubleshooting” into the Start screen, which opens the Troubleshooting program. You will see the default microphone, as well as volume levels for your speakers and microphone. If the blue bar jumps around while you talk, the microphone is working properly. You can then click “OK” to continue the process. The next step is to test your microphone. Reinstalling hardware means reinstalling the drivers. <br/> From inside the Device Manager window, expand the menus and look for the Sound drivers. Right-click the speaker icon on the Windows taskbar and then select Sound settings. You can also access this through the Windows 11 Settings app. Not all applications will be listed here, most of your desktop apps will have access to the microphone when you select ‘on’ in number 4 above. The microphone boost is an audio enhancement that is applied to the mic.',
		},
		{
			id: 4,
			date: 'October 14, 2022',
			postedBy: 'Sealinks Holidays',
			title: '5 Major bad sim card symptoms you should know',
			image: 'https://i.ytimg.com/vi/A-j5fSRaMq8/hqdefault.jpg',
			discription:
				'You can start by typing “troubleshooting” into the Start screen, which opens the Troubleshooting program. You will see the default microphone, as well as volume levels for your speakers and microphone. If the blue bar jumps around while you talk, the microphone is working properly. You can then click “OK” to continue the process. The next step is to test your microphone. Reinstalling hardware means reinstalling the drivers. <br/> From inside the Device Manager window, expand the menus and look for the Sound drivers. Right-click the speaker icon on the Windows taskbar and then select Sound settings. You can also access this through the Windows 11 Settings app. Not all applications will be listed here, most of your desktop apps will have access to the microphone when you select ‘on’ in number 4 above. The microphone boost is an audio enhancement that is applied to the mic.',
		},
		{
			id: 5,
			date: 'October 14, 2022',
			postedBy: 'Sealinks Holidays',
			title: '5 Major bad sim card symptoms you should know',
			image: 'https://i.ytimg.com/vi/A-j5fSRaMq8/hqdefault.jpg',
			discription:
				'You can start by typing “troubleshooting” into the Start screen, which opens the Troubleshooting program. You will see the default microphone, as well as volume levels for your speakers and microphone. If the blue bar jumps around while you talk, the microphone is working properly. You can then click “OK” to continue the process. The next step is to test your microphone. Reinstalling hardware means reinstalling the drivers. <br/> From inside the Device Manager window, expand the menus and look for the Sound drivers. Right-click the speaker icon on the Windows taskbar and then select Sound settings. You can also access this through the Windows 11 Settings app. Not all applications will be listed here, most of your desktop apps will have access to the microphone when you select ‘on’ in number 4 above. The microphone boost is an audio enhancement that is applied to the mic.',
		},
	],
};
