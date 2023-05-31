import React from 'react';
import { TiLocationOutline } from 'react-icons/ti';
import { ImMobile, ImFacebook2 } from 'react-icons/im';
import { MdOutlineMarkEmailUnread } from 'react-icons/md';
import { FaInstagramSquare, FaTripadvisor } from 'react-icons/fa';
import { TfiYoutube } from 'react-icons/tfi';

// import Hea
const Contact = ({ contactCardsData }) => {
	const contactCardIcon = {
		location: <TiLocationOutline className="card-icon" />,
		number: <ImMobile className="card-icon" />,
		email: <MdOutlineMarkEmailUnread className="card-icon" />,
	};

	const cards = contactCardsData.map((item) => {
		const icon = contactCardIcon[item.type];
		return (
			<div className="contact-cards " key={item.id}>
				<div className="contact-card ">
					<div className="icons-wrapper">{icon}</div>
					<div className="card-text">
						{item.data.map((item, idx) => (
							<div className="detail" key={idx}>
								{item}
							</div>
						))}
					</div>
				</div>
			</div>
		);
	});

	const handleFormSubmit = (e) => {
		e.preventDefault();
		console.log('your form is submitted');
	};

	const bannerImage =
		'https://sealinkstravel.com/wp-content/uploads/2020/02/banner.jpg';

	return (
		<div className="contact-page">
			<img src={bannerImage} alt="main-banner" className="banner" />
			<div className="container body-section">
				<h2 className="contact-caption">Feel Free To Contact Us</h2>
				<div className="form-card-wrapper container row">
					<div className="form-container col-md-8">
						<div className="form-section form-group">
							<form
								onSubmit={(e) => {
									handleFormSubmit(e);
								}}
							>
								<div className="row">
									<div className="col-md-12 mb-3">
										<div className="form-group">
											<label htmlFor="fullName">Name :</label>
											<input
												type="text"
												name="fullName"
												className="form-control"
											/>
										</div>
									</div>
									<div className="col-md-12 mb-3">
										<div className="form-group">
											<label htmlFor="email">Email :</label>
											<input
												type="text"
												name="email"
												className="form-control"
											/>
										</div>
									</div>
									<div className="col-md-12 mb-3">
										<div className="form-group">
											<label htmlFor="contactNumber">Contact No : </label>
											<input
												type="text"
												name="contactNumber"
												className="form-control"
											/>
										</div>
									</div>
									<div className="col-md-12 mb-3">
										<div className="form-group">
											<label htmlFor="address">Address : </label>
											<textarea
												type="textarea"
												name="address"
												className="form-control"
												rows="15"
											/>
										</div>
									</div>
									<button type="sumbit" className="send-button mt-3">
										Send Message
									</button>
								</div>
							</form>
						</div>
					</div>
					<div className="cards-container  col-md-4">{cards}</div>
				</div>
				<div className="container-section-3 row">
					<div className="text-wrapper">
						<div className="text">
							<div className="left-container">
								<div className="asking">
									Have any Question? Feel free to contact us.
								</div>
							</div>
							<div className="right-container">
								<div className="contact-with-us">Connect with us</div>
								<div className="social-icons">
									<ImFacebook2 className="fb social-icon" />
									<FaInstagramSquare className="insta social-icon" />
									<TfiYoutube className="youtube social-icon" />
									<FaTripadvisor className="tripadvisor social-icon" />
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	);
};

export default Contact;

Contact.defaultProps = {
	contactCardsData: [
		{
			id: 0,
			type: 'location',
			data: ['Nag Pokhari, Kathmandu, Nepal', 'Next To Nag Pokhari, Naxal'],
		},
		{
			id: 1,
			type: 'number',
			data: ['+977-01-4427892 /4424953', '+977 9801093735'],
		},
		{
			id: 2,
			type: 'email',
			data: ['info@sealinks.com.np', 'info@sealinks.com.np'],
		},
	],
};
