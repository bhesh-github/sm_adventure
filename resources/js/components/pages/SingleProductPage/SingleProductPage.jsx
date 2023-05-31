import React from 'react';
import Header from '../../main/headers/Header';
import StarsRating from '../../allSmallComponents/StarsRating';
import GalleryWithSlider from './GalleryWithSlider';
import SelectParticipants from './selectParticipants/SelectParticipants';
import TourEvents from './TourEvents';
import ReactPlayer from 'react-player';
import Reviews from '../../allSmallComponents/Reviews';
const SingleProductPage = ({
	tourGallery,
	selectParticipantsData,
	itineraryData,
	reviewsData,
}) => {
	const itineraryList = itineraryData.map((item) => (
		<li className="list" key={item.id}>
			<input type="radio" name="accordion" id={`unique ${item.id}`} />
			<label htmlFor={`unique ${item.id}`}>{item.title}</label>
			<div className="content">
				{item.discription}
				<div className="discription-list">
					<ul>{item.list && <li>{item.list}</li>}</ul>
				</div>
				<div className="note">{item.note && item.note}</div>
			</div>
		</li>
	));
	return (
		<>
			<div className="single-product-page">
				<GalleryWithSlider tourGallery={tourGallery} />
				<div className="tour-description-section container px-0">
					<div className="tour-heading">
						<h1 className="tour-name">Jungle Highlights</h1>
						<span className="number-of-days-and-address">
							15 Days at Saura National Park in Chitwan
						</span>
						<span className="stars-rating">
							<StarsRating />
						</span>
					</div>
					<SelectParticipants selectParticipantsData={selectParticipantsData} />
					<div className="inner-section row">
						<div className="inner-section-first-column col-md-8">
							<div className="tour-events-section">
								<div className="tour-events-comp">
									<TourEvents />
								</div>
							</div>
							<div className="question-wrapper ">
								<div className="itinerary-heading">Your Itinerary</div>
								<div className="accordion-container">
									<ul className="accordion">{itineraryList}</ul>
								</div>
							</div>
						</div>
						<div className="inner-section-second-column  col-md-4">
							<div className="tour-map">
								<iframe
									title="google-map"
									className="google-map"
									src="https://www.google.com/maps/embed?pb=!1m26!1m12!1m3!1d403468.4381890566!2d84.0847737765562!3d27.528059359770225!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!4m11!3e6!4m3!3m2!1d27.731558399999997!2d85.3573632!4m5!1s0x3994b0337772df43%3A0xafa1603d5d63a217!2schitwan%20national%20park!3m2!1d27.519285!2d84.31353179999999!5e0!3m2!1sen!2snp!4v1684228620028!5m2!1sen!2snp"
									width="100%"
									height="100%"
									style={{ border: 0 }}
									allowFullScreen=""
									loading="lazy"
									referrerPolicy="no-referrer-when-downgrade"
								></iframe>
							</div>
							<div className="video">
								<ReactPlayer
									url="https://www.youtube.com/watch?v=9UjK5jC8T5U&t=21s"
									controls
									width="100%"
									height="100%"
								/>
							</div>
							<div className="help-or-support container">
								<h1 className="number">
									For more Enquiry
									<br />
									Tel-9811556690
								</h1>
							</div>
						</div>
					</div>
					<hr className="hr" />
					{reviewsData && <Reviews reviewsData={reviewsData} />}
				</div>
			</div>
		</>
	);
};

export default SingleProductPage;

SingleProductPage.defaultProps = {
	tourGallery: [
		'https://images.pexels.com/photos/7625308/pexels-photo-7625308.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=2',
		'https://images.pexels.com/photos/5118529/pexels-photo-5118529.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=2',
		'https://images.pexels.com/photos/931007/pexels-photo-931007.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=2',
		'https://images.pexels.com/photos/758744/pexels-photo-758744.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=2',
		'https://images.pexels.com/photos/631317/pexels-photo-631317.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=2',
		'https://images.pexels.com/photos/982021/pexels-photo-982021.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=2',
		'https://images.pexels.com/photos/70442/pexels-photo-70442.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=2',
		'https://images.pexels.com/photos/3136711/pexels-photo-3136711.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=2',
		'https://images.pexels.com/photos/10740862/pexels-photo-10740862.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=2',
	],
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
				'Early flight to Pokhara followed by a drive to a stop from where the trek to Ghandruk (1940m) begins..',
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
	selectParticipantsData: [
		{
			id: 0,
			title: 'Tour Date',
			body: 'selectDate',
		},
		{
			id: 1,
			title: 'Adult',
			body: 'selectAdult',
		},
		{
			id: 2,
			title: 'Children',
			body: 'selectChildren',
		},
		{
			id: 3,
			title: 'Infant 0-3 yrs',
			body: 'selectInfant',
		},
		{
			id: 4,
			title: 'Total Amount',
			body: 'totalAmountResult',
		},
	],
	reviewsData: [
		{
			id: 0,
			name: 'Steve Jobs',
			imageUrl:
				'https://upload.wikimedia.org/wikipedia/commons/thumb/d/dc/Steve_Jobs_Headshot_2010-CROP_%28cropped_2%29.jpg/800px-Steve_Jobs_Headshot_2010-CROP_%28cropped_2%29.jpg',
			date: 'March 2023',
			reviewTitle: 'Fun & Adventerous !',
			reviewDiscription:
				' The Atlantis Aqua Venture Day Pass from Rayna Tours helped us access the Lost Chamber Aquarium, private beach, and all the rides and attractions all that made paying for the pass totally worth.',
			stars: 4.9,
		},
		{
			id: 1,
			name: 'Elon Musk',
			imageUrl:
				'https://i.guim.co.uk/img/media/b10f15a0955d23826586810847cc3431e36616f1/0_508_2065_1238/master/2065.jpg?width=1200&height=1200&quality=85&auto=format&fit=crop&s=b6b0e2df577f6dc993d68b672483ef58',
			date: 'Jan 2022',
			reviewTitle: 'delightful. One of a kind !',
			reviewDiscription:
				' The Atlantis Aqua Venture Day Pass from Rayna Tours helped us access the Lost Chamber Aquarium, private beach, and all the rides and attractions all that made paying for the pass totally worth.',
			stars: 4.5,
		},
		{
			id: 3,
			name: 'Thomas Alva Edison',
			imageUrl:
				'https://hips.hearstapps.com/hmg-prod/images/gettyimages-615312634.jpg',
			date: 'Apr 2020',
			reviewTitle: 'Sweet',
			reviewDiscription:
				' The Atlantis Aqua Venture Day Pass from Rayna Tours helped us access the Lost Chamber Aquarium, private beach, and all the rides and attractions all that made paying for the pass totally worth.',
			stars: 5.0,
		},
		{
			id: 4,
			name: 'Henry Ford',
			imageUrl:
				'https://cdn.britannica.com/99/96899-050-CADC4254/Henry-Ford.jpg',
			date: 'Dec 2023',
			reviewTitle: 'Rocking Fire',
			reviewDiscription:
				' The Atlantis Aqua Venture Day Pass from Rayna Tours helped us access the Lost Chamber Aquarium, private beach, and all the rides and attractions all that made paying for the pass totally worth.',
			stars: 5.0,
		},
		{
			id: 5,
			name: 'Steve Jobs',
			imageUrl:
				'https://upload.wikimedia.org/wikipedia/commons/thumb/d/dc/Steve_Jobs_Headshot_2010-CROP_%28cropped_2%29.jpg/800px-Steve_Jobs_Headshot_2010-CROP_%28cropped_2%29.jpg',
			date: 'March 2023',
			reviewTitle: 'Exteremly Rubbish !',
			reviewDiscription:
				' The Atlantis Aqua Venture Day Pass from Rayna Tours helped us access the Lost Chamber Aquarium, private beach, and all the rides and attractions all that made paying for the pass totally worth.',
			stars: 5,
		},
		{
			id: 6,
			name: 'Elon Musk',
			imageUrl:
				'https://i.guim.co.uk/img/media/b10f15a0955d23826586810847cc3431e36616f1/0_508_2065_1238/master/2065.jpg?width=1200&height=1200&quality=85&auto=format&fit=crop&s=b6b0e2df577f6dc993d68b672483ef58',
			date: 'Jan 2022',
			reviewTitle: 'delightful. One of a kind !',
			reviewDiscription:
				' The Atlantis Aqua Venture Day Pass from Rayna Tours helped us access the Lost Chamber Aquarium, private beach, and all the rides and attractions all that made paying for the pass totally worth.',
			stars: 5.0,
		},
		{
			id: 7,
			name: 'Thomas Alva Edison',
			imageUrl:
				'https://hips.hearstapps.com/hmg-prod/images/gettyimages-615312634.jpg',
			date: 'Apr 2020',
			reviewTitle: 'Sweet',
			reviewDiscription:
				' The Atlantis Aqua Venture Day Pass from Rayna Tours helped us access the Lost Chamber Aquarium, private beach, and all the rides and attractions all that made paying for the pass totally worth.',
			stars: 5.0,
		},
		{
			id: 8,
			name: 'Henry Ford',
			imageUrl:
				'https://cdn.britannica.com/99/96899-050-CADC4254/Henry-Ford.jpg',
			date: 'Dec 2023',
			reviewTitle: 'Rocking Fire',
			reviewDiscription:
				' The Atlantis Aqua Venture Day Pass from Rayna Tours helped us access the Lost Chamber Aquarium, private beach, and all the rides and attractions all that made paying for the pass totally worth.',
			stars: 5.0,
		},
	],
};
