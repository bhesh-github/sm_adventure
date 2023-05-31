import React from "react";

const VisaInformation = ({ visaInfoData }) => {
  const visaFeesList = visaInfoData.map((item, idx) => (
    <li className="list" key={idx}>{item}</li>
  ));
  return (
    <>
      <div className="visa-info-page">
        <img
          src="https://sealinkstravel.com/wp-content/uploads/2020/02/banner.jpg"
          alt="banner-image"
          className="banner-image"
        />
        <div className="info-section container">
          <h4 className="sub-heading">PASSPORT AND VISAS</h4>
          <p className="visa-brief">
            You must carry a valid passport and have obtained all of the
            appropriate visas, permits and certificates for the countries in
            which you will visit during your trip. Your passport must be valid
            for six months beyond the duration of the trip. It is your
            responsibility to ensure that you are in possession of the correct
            visas, permits and certificates for your trip; please refer to the
            Trip Notes for details. We are not responsible if you are refused
            entry to a country because you lack the correct passport, visa or
            other travel documentation.
          </p>
          <h4 className="sub-heading">VISA FEES</h4>
          <ul className="visa-fees-list">{visaFeesList}</ul>
          <h4 className="sub-heading">Tourist Visa Extension</h4>
          <p className="visa-brief">
            Visa extension fee for 15 days or less is US $ 30 or equivalent
            convertible currency and visa extension fee for more than 15 days is
            US$ 2 per day
          </p>
          <p className="visa-brief">
            Tourist visa can be extended for a maximum period of 150 days in a
            single visa year (January – December).
          </p>
        </div>
      </div>
    </>
  );
};

export default VisaInformation;

VisaInformation.defaultProps = {
  visaInfoData: [
    " Gratis visa for 30 days available only for tourists of SAARC countries",
    " Multiple entry 15 days – US$ 25 or equivalent convertible currency",
    "Multiple entry 30 days – US$ 40 or equivalent convertible currency",
    " Multiple entry 90 days – US$ 100 or equivalent convertible currency",
  ],
};
