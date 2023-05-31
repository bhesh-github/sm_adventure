import React from 'react';
// import Accordion from '../allSmallComponents/Accordion';
const FaqPage = ({ faqData }) => {
	const faqbannerImg =
		'https://sealinkstravel.com/wp-content/uploads/2020/02/banner.jpg';

	const sideImage =
		'https://images.pexels.com/photos/16494849/pexels-photo-16494849/free-photo-of-wood-light-dawn-landscape.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=2';

	const questionAndAnswer = faqData.map((item, idx) => {
		return (
			<li key={item.id} className="list">
				<input type="radio" name="accordion" id={`unique-${idx}`} />
				<label htmlFor={`unique-${idx}`}>{item.question}</label>
				<div className="content">
					{item.answer}
					<span className="discription-list">
						<ul>
							{item.list &&
								item.list.map((item, idx) => <li key={idx}>{item}</li>)}
						</ul>
					</span>
					<div className="note">{item.note && item.note}</div>
				</div>
			</li>
		);
	});

	return (
		<>
			<div className="faq-page ">
				<img src={faqbannerImg} alt="main-banner" className="faq-banner" />
				<div className="body container">
					<div className="inner-section row ">
						<div className="column-1 col-md-8">
							<div className="question-wrapper ">
								<div className="accordion-section">
									<div className="faq-heading">Frequently Asked Question</div>
									<div className="accordion-wrapper">
										<ul className="accordion">{questionAndAnswer}</ul>
									</div>
								</div>
							</div>
						</div>
						<div className="column-2 col-md-4">
							<img className="side-image"  src={sideImage} alt='col'/>
						</div>
					</div>
				</div>
			</div>
			<div>{/* <Accordion /> */}</div>
		</>
	);
};

export default FaqPage;

// const ItineraryFromCodepen = ({ itineraryData }) => {

//   const dailyDetails = itineraryData.map((item, idx) => (
//     <div className="dailyDetails" key={item.id}>
//       <input id={`day-${idx + 1}`} type="checkbox" />
//       <label htmlFor={`day-${idx + 1}`}>
//         <p className="faq-heading">
//           Day {idx + 1} : {item.title}
//         </p>
//         <div className="faq-arrow"></div>
//         <p className="faq-text">{item.discription}</p>
//       </label>
//       <input id="faq-b" type="checkbox" />
//     </div>
//   ));

//   return (
//     <div className="itinerary-from-codepen-wrapper">
//       <div className="itinerary-heading">Your Itinerary</div>
//       <div className="faq">{dailyDetails}</div>
//     </div>
//   );
// };

FaqPage.defaultProps = {
	faqData: [
		{
			id: 0,
			question: 'How do I get to Nepal?',
			answer:
				'Tribhuvan International Airport (TIA) in Kathmandu is the only international airport in Nepal. The national flag carrier, Nepal Airlines, and other international airlines directly connect Kathmandu with major cities around the world.',
		},
		{
			id: 1,
			question: 'What are the entry points?',
			answer:
				'All visitors coming to Nepal by land can enter through any of these entry points on the India- Nepal Border:',
			list: [
				'Pani Tanki (Kakarbhitta)',
				'Raxaul (Birgunj)',
				'Sunauli (Belahiya)',
				'Rupaidiya (Nepalgunj)',
				'Mohana (Dhangadi)',
				'Banbasa (Mahendranagar)',
				'Jogbani (Biratnagar)',
				'Khasa, Liping/Tatopani on the Tibet, China-Nepal border respectively.',
			],
			note: 'Overland tourists entering the country with their vehicles must possess an international carnet or complete customs formalities.',
		},
		{
			id: 2,
			question: 'What are the Air Accesses to Nepal?',
			answer:
				'Nepal Airlines is the national flag carrier of Nepal with flights to/from Kuala Lumpur, Dubai, Bangkok, Doha and Hong Kong. Other international airlines operating from/to Kathmandu are:',
			list: [
				'Air Arabia (Sharjah)',
				'Air Asia (Malaysia)',
				' Air China (Lhasa, Chengdu)',
				'Bahrain Air (Bahrain)',
				' Bhutan Airlines (Paro)',
				'Biman Bangladesh (Dhaka)',
				'Buddha Air (Paro, Lucknow)',
				'China Eastern Airlines (Kunming)',
				'China Southern Airlines (Guanzhou)',
				'Dragon Air (Hong Kong)',
				'Druk Air (Delhi, Paro)',
				'Etihad Airways (Abu Dhabi)',
				'Flydubai (Dubai)',
				'Indian Airlines (Delhi, Kolkotta, Varanasi)',
				'Indigo Airlines (Delhi)',
				'Jet Airways (Delhi, Mumbai)',
				'Korean Air (Seoul)',
				'Oman Air (Muscat)',
				'Malaysian Airlines (Malaysia)',
				'Malindo Airways (Malaysia)',
				'Pakistan International Airlines (Karachi, Islamabad)',
				'Qatar Airways (Doha)',
				'Silk Air (Singapore)',
				'Spicejet (Delhi)',
				'Thai Airways (Bangkok)',
			],
		},
		{
			id: 3,
			question: 'What is Nepal known for?',
			answer:
				'Nepal is known for Mount Everest, the highest mountain in the world, spectacular natural beauty that can be seen in its land specially hilly regions, known as the birth place of Lord Buddha, and the Hindu Goddess Lord Sita. Also known as the home of Gurkha Warriors. It is also known as a country with abundant Natural Water Sources.',
		},
		{
			id: 4,
			question: 'What is the national language of Nepal?',
			answer:
				'Nepal’s national language is called Nepali. It is written in Devnagri Script. This script is the same as the one used in Hindi language – the national language of India. There are more than 72 different spoken languages in Nepal.',
		},
		{
			id: 5,
			question: "What's the common form of greeting in Nepal?",
			answer:
				'Gambling is illegal in Nepal. There are numerous Casino in the Capital Kathmandu and Pokhara, which are mostly open to Tourists only. Some of the casino have video games, slot machines, and they are open 24 hours',
		},
		{
			id: 6,
			question: 'Is gambling allowed in Nepal? or Do you have Casino',
			answer:
				'It is called Namaste or Namaskar. You can say the greeting in words as well as do it using a gesture. Join your palms together and bring them close to your chest and about 5 to 7 inches below your chin. The word Namaste has many meanings such as Hello, How are you?, I am glad to see you, nice to meet you, good morning, etc.',
		},
		{
			id: 7,
			question: 'Is sex business legal in Nepal?',
			answer: 'Prostitution is illegal in Nepal',
		},
	],
};
