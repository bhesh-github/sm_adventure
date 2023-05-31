import React from 'react';

const OurCompanies = ({ companies }) => {
	const company = companies.map((item) => {
		return item.companyLogo ? (
			<div className="logo" key={item.id}>
				<img
					src={item.companyLogo}
					alt="aribnb logo"
					className="logo-image"
					key={item.id}
				/>
			</div>
		) : (
			<div className="logo" key={item.id}>
				<span className="company-text">{item.companyName}</span>
			</div>
		);
	});

	return (
		<div className="our-companies">
			<h1 className="our-companies-heading">Our Companies</h1>

			<div className="div-logo-wrapper container">{company}</div>
		</div>
	);
};

export default OurCompanies;

OurCompanies.defaultProps = {
	companies: [
		{
			id: 0,
			companyLogo:
				'https://upload.wikimedia.org/wikipedia/commons/thumb/6/69/Airbnb_Logo_B%C3%A9lo.svg/1200px-Airbnb_Logo_B%C3%A9lo.svg.png',
			companyName: 'aribnb',
		},
		{
			id: 1,
			companyLogo:
				'https://viterbicareers.usc.edu/wp-content/uploads/2019/04/tripadvisor-logo-vector-png-trip-advisor-logo-png-720.png',
			companyName: 'tripadvisor',
		},
		{
			id: 2,
			companyLogo:
				'https://i0.wp.com/www.dafontfree.co/wp-content/uploads/2021/11/Amazon-Logo-Font-1-scaled.jpg?resize=2560%2C1578',
			companyName: 'amazon',
		},
		{
			id: 3,
			// companyLogo: "https://cdn.worldvectorlogo.com/logos/tesla-motors.svg",
			companyName: 'TESLA',
		},
		{
			id: 4,
			companyLogo:
				'https://upload.wikimedia.org/wikipedia/commons/thumb/1/1b/EBay_logo.svg/800px-EBay_logo.svg.png',
			companyName: 'ebay',
		},
		{
			id: 5,
			companyLogo:
				'https://upload.wikimedia.org/wikipedia/commons/5/5b/Daraz_Logo.png',
			companyName: 'Daraz',
		},
		{
			id: 6,
			// companyLogo:
			//   "https://upload.wikimedia.org/wikipedia/commons/thumb/6/69/Airbnb_Logo_B%C3%A9lo.svg/1200px-Airbnb_Logo_B%C3%A9lo.svg.png",
			companyName: 'aribnb',
		},
		{
			id: 7,
			companyLogo:
				'https://viterbicareers.usc.edu/wp-content/uploads/2019/04/tripadvisor-logo-vector-png-trip-advisor-logo-png-720.png',
			companyName: 'tripadvisor',
		},
		{
			id: 8,
			// companyLogo:
			//   "https://i0.wp.com/www.dafontfree.co/wp-content/uploads/2021/11/Amazon-Logo-Font-1-scaled.jpg?resize=2560%2C1578",
			companyName: 'amazon',
		},
		{
			id: 9,
			companyLogo: 'https://cdn.worldvectorlogo.com/logos/tesla-motors.svg',
			companyName: 'TESLA',
		},
		{
			id: 10,
			companyLogo:
				'https://upload.wikimedia.org/wikipedia/commons/thumb/1/1b/EBay_logo.svg/800px-EBay_logo.svg.png',
			companyName: 'ebay',
		},
		{
			id: 11,
			companyLogo:
				'https://upload.wikimedia.org/wikipedia/commons/5/5b/Daraz_Logo.png',
			companyName: 'Daraz',
		},
	],
};
