import React from 'react';
import Header from '../main/headers/Header';

const AboutUs = () => {
	const bannerImage =
		'https://sealinkstravel.com/wp-content/uploads/2020/02/banner.jpg';
	return (
		<>
			{/* <div className="about-us"> */}
			<img src={bannerImage} alt="main-banner" className="banner" />
			<h1 className="title">
				<span className="sealink">Sealinks</span>
				<span className="holidays"> Holidays</span>
			</h1>
			<h2 className="caption">
				is a World Leading Online Tour Booking Platform
			</h2>
			<div className="body-section container">
				<h2 className="heading">Sea Links- A perfect Travel Solution</h2>
				<p>
					Coming from a humble beginning in the year AD 2007 with a Travel
					Agency – <strong>Sealinks</strong> Travels and Tours, the company has
					since then taken quantum leaps to become one of the leading travel
					agencies in Nepal. Since the inception of the company, commitment to
					innovation and excellence in quality of services has been the
					hallmarks of the company that may be one good reason to expand our
					service wings under the name of Sealinks Holidays for Outbound and
					Inbound luxury and leisure travel group.
					<br /> <br />
					We are proud to share that currently Sealinks Travels and Tours;
					became one of the leading agencies in Nepal. It has its operation
					office in Nagpokhari, Kathmandu has grown into one of the best travel
					brands in Nepal. We offer the complete range of travel related
					services including Ticketing (International and Domestic), Tours,
					Trekking, Tourist Bus service, Car Rentals, and Helicopter Charter,
					Mountain Flights and all kinds of adventurous activities and many
					more.
					<br /> <br />
					In order to promote our products and services, we have specified our
					wings separately. Sealinks Travels will cater to entire itineraries
					services- ticketing. Sea Links Holidays will carry entire Inbound and{' '}
					<strong>Outbound tour packages</strong> for all kinds of travellers.
					<br /> <br />
					With this concern, we are pleased to inform you that our company has
					decided to make the B2B business expansion with Travel Partners for
					our Domestic/International Ticketing. We are specialized in
					International Ticketing. We have capitalized the opportunity by
					connecting our valuable clients to the world for which we can offer a
					competitive rate in a Market (All the Season).
					<br /> <br />
					With very less effort and exercising we can start travel business to
					sell tickets with competitive rates and good commission. In this
					connection, we are interested to discuss the ideas to promote our
					products for our mutual benefit. Our long term experience in
					International Ticketing encourages us to extend our hands with your
					esteemed organization.
					<br /> <br />
				</p>
			</div>

			{/* </div> */}
		</>
	);
};

export default AboutUs;
