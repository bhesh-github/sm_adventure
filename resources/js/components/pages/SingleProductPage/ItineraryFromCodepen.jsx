import React from 'react';
// import * as npm from "https://cdn.skypack.dev/npm";

const ItineraryFromCodepen = ({ itineraryData }) => {
	const dailyDetails = itineraryData.map((item, idx) => (
		<div className="dailyDetails" key={item.id}>
			<input id={`day-${idx + 1}`} type="checkbox" />
			<label htmlFor={`day-${idx + 1}`}>
				<p className="faq-heading">
					Day {idx + 1} : {item.title}
				</p>
				<div className="faq-arrow"></div>
				<p className="faq-text">{item.discription}</p>
			</label>
			<input id="faq-b" type="checkbox" />
		</div>
	));

	return (
		<div className="itinerary-from-codepen-wrapper">
			<div className="itinerary-heading">Your Itinerary</div>
			<div className="faq">{dailyDetails}</div>
		</div>
	);
};

export default ItineraryFromCodepen;

ItineraryFromCodepen.defaultProps = {
	itineraryData: [
		{
			id: 0,
			title: 'Arrive at Kathmandu',
			discription:
				'Upon arrival at Kathmandu airport our representative will escort you to our hotel. Evening curriculum comprises of dinner at an authentic Nepali restaurant for a taste of our culture.',
		},
		{
			id: 1,
			title: 'Flight To Pokhara',
			discription:
				"Early flight to Pokhara followed by a drive to a stop from where the trek to Ghandruk (1940m) begins..Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.",
		},
		{
			id: 2,
			title: 'Trekking To Chomrong',
			discription: 'Trek continues from Ghandruk to Chomrong (2170m.)',
		},
		{
			id: 3,
			title: 'Trekking To Bamboo',
			discription: 'Next destination is Bamboo at an elevation (2310m.)',
		},
		{
			id: 4,
			title: 'Reached Deurali',
			discription:
				'Through a bamboo forest leads us to Deurali at an elevation of 3230m.',
		},
		{
			id: 5,
			title: 'Trekking To Annapurna Base Camp',
			discription:
				'Trek to Annapurna Base Camp (4310m) via Machaphuchre Base Camp (3700m.)',
		},
		{
			id: 6,
			title: 'Retracing To Base Camp',
			discription: 'Retracing of steps back to Bamboo from the base camp.',
		},
		{
			id: 7,
			title: 'Trekking To Jhinu Dada',
			discription: 'Trek from Bamboo to Jhinu Danda (1760m.)',
		},
		{
			id: 8,
			title: 'Trekking To Nayapul',
			discription: 'Trek to Nayapul followed by drive to Pokhara city.',
		},
		{
			id: 9,
			title: 'Flight Back To Kathmandu',
			discription:
				'Flight to Kathmandu followed by leisure activities on one’s choice.',
		},
		{
			id: 10,
			title: 'Escort Back To Airport',
			discription:
				'Our escort will drop you to the airport in time for the departure to your next destination.',
		},
	],
};
