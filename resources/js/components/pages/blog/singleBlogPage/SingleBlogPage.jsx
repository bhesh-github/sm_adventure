import React from 'react';
import RecentPosts from './RecentPosts';
import { ImFacebook2 } from 'react-icons/im';
import { TfiYoutube } from 'react-icons/tfi';
import { FaInstagramSquare, FaTripadvisor } from 'react-icons/fa';

const SingleBlogPage = () => {
	const faqbannerImg =
		'https://sealinkstravel.com/wp-content/uploads/2020/02/banner.jpg';

	return (
		<div className="single-blog-page">
			<img src={faqbannerImg} alt="main-banner" className="blog-banner " />
			<div className="content container row">
				<div className="left col-md-8">
					<div className="blog">
						<div className="small-badge">
							<span className="date">October 12, 2022</span>
							<span className="posted-by"> Sea Links Travel</span>
						</div>
						<h2 className="content-heading">Online dating worldwide</h2>
						<div className="content-dis">
							Set up a free email account to use with your dating account that
							has a unique name. Make sure that the email account has no
							personal information about you in the address. Of course, you want
							to create an enticing and attractive picture of yourself for
							others to see, but keep a tight grip on what personal information
							you put out there for everyone to see. For example, it’s ok to say
							what you do for work, but not to say what company it is.
							<br />
							If the app you’re using has a video chat feature built in, then
							make use of that, as it’s the most secure and easy way to connect.
							Bumble is a little bit unique among dating apps because it
							requires women to send the first message when they match with men.
							If you do not send a message within 24 hours, the match
							disappears! If two women match, then either can message first, but
							if neither do so within 24 hours, the match also disappears.
							However, dating sites and dating apps can actually be a great way
							for older people to get back into the dating game because
							ultimately you’re the one in control.
							<br />
							While I’m not saying you should be expecting a man in a wig to
							show up, you should kind of automatically assume that their
							pictures were old or edited, or at the least, something that shows
							their very best light. Not that that’s always the case, but just
							keep in mind that you can never truly know someone you haven’t
							talked to in the flesh. So for those of us single folks who
							haven’t yet made the jump into this new internet trend , here are
							a few ways you can give online dating a try while staying a
							gentleman. In a victory for users, Slack has fixed its
							long-standing retention problems for free workspaces. Instead of
							holding onto your messages on its servers for as long as your
							workspace exists, Slack is now giving free workspace admins the
							option to automatically delete all messages older than 90 days….
							<br />
							There are several options to choose from to keep you safe and help
							you feel comfortable. It is hard to step outside of the norm that
							society forces on us and in some cases, it can be unsafe. We have
							many users who join HER to discover themselves while keeping
							themselves safe in their home environments. Finally being able to
							safely chat with other queer people, make friends, and maybe even
							matches is often a healing and rewarding experience for our users.
							That’s why we have an ‘Add Friend’ option on profiles so you can
							build your community of people.
							<br />
							Odds are, if you’ve participated in online dating, you have a few
							bad date stories. Often the cause of these negative experiences is
							that your expectations don’t match up with reality. Bobby says
							that while online dating requires some “marketing savvy” and the
							ability to, in essence, sell yourself online, you shouldn’t
							sacrifice the truth to come across as what you perceive to be
							“better.” While you might be worried it’s not a good idea , like
							all matters in love, it has its pros and cons. We decided to bring
							the question to licensed marriage and family therapist and
							relationship expert Lisa Marie Bobby, Ph.D., of Growing Self
							Counseling and Coaching.
							<br />
						</div>
					</div>
				</div>
				<div className=" right col-md-4">
					<RecentPosts />
					<div className="follow-us">
						<h5 className="follow-us-title">Follow Us</h5>
						<span className="icons-social">
							<ImFacebook2 className="react-icon" />
							<FaInstagramSquare className="react-icon" />
							<TfiYoutube className="react-icon" />
							<FaTripadvisor className="react-icon" />
						</span>
					</div>
				</div>
			</div>
		</div>
	);
};

export default SingleBlogPage;
