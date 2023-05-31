import React from "react";

const BookingInformation = ({ cancellationProcedure }) => {
  const cancellationList = cancellationProcedure.map((item, idx) => (
    <li key={idx}>{item}</li>
  ));
  return (
    <>
      <div className="booking-info-page">
        <img
          src="https://sealinkstravel.com/wp-content/uploads/2020/02/banner.jpg"
          alt="banner"
          className="banner-image"
        />
        <div className="info-section container">
          <h2 className="main-heading">
            Terms And Conditions While Booking And Cancelation
          </h2>
          <h4 className="sub-heading">BOOKING CONDITIONS</h4>
          <p className="booking-brief">
            Your booking will be confirmed by email once we receive your deposit
            of 40% of total trip cost & the balance 60% of total trip cost after
            on arrival in Kathmandu.
          </p>
          <h4 className="sub-heading">CANCELLATION</h4>
          <p className="cancellation-brief">
            In case of <span className="highlight">cancellation</span> by the
            Traveller, the Agency has the right to charge a percentage
            cancellation fee according to the following scale:
          </p>
          <ul className="cancellation-list">{cancellationList}</ul>
        </div>
      </div>
    </>
  );
};

export default BookingInformation;

BookingInformation.defaultProps = {
  cancellationProcedure: [
    "Up to 30 days before the “Trip Start Day” a fee of 20%",
    "15-29 days before the “Trip Start Day” a fee of 30%",
    "7-14 days before the “Trip Start Day” a fee of 60%",
    "6 or less days until the “Trip Start Day” and in the event of non-appearance a fees of 90%",
  ],
};
