<?php
/**
 * Articles and opinion pieces shown on articles.php, newest first.
 * Add verified writing only. Each record:
 *
 *   'title'      required
 *   'subtitle'   optional; shown under the title on the article page
 *   'category'   required; one of the topic titles listed in articles.php
 *   'summary'    short, accurate description
 *   'date'       as it should be displayed; omit if not confirmed
 *   'source'     publication or publisher; omit if not confirmed
 *   'url'        link to the published article (https://…); omit when the
 *                full text is given in 'body' and shown on this site
 *   'link_label' optional; defaults to "Read article"
 *   'image'      16:10 .jpg under assets/images/articles/, named …-1200.jpg,
 *                with a …-700.jpg copy beside it for small screens
 *   'image_alt'  description of the image
 *   'slug'       lowercase-hyphenated name for article.php?slug=… (needed with 'body')
 *   'body'       full text as a list of blocks, shown on article.php:
 *                  ['h2', 'Heading']   ['h3', 'Subheading']   ['p', 'Paragraph']
 *                  ['ul', ['item', …]]  ['dl', [['Term', 'Description'], …]]
 *                  ['link', 'Label', 'https://…']  (an official link on its own line)
 *                  ['note', 'Heading', ['Paragraph', …]]  (disclaimer or author box)
 */

$about_author = [
    'Shri Daksh Jain is a young, dynamic and dedicated professional with experience in law, public policy, research, governance and social service. He is deeply committed to promoting child protection, human rights, public welfare and holistic wellness.',
    'Shri Jain has actively contributed to society through his association with various government advisory bodies, social organisations and public initiatives. His work reflects a strong commitment to nation-building, policy research and community development.',
    'His areas of expertise include research and analysis, protocol management, coordination with Central and State Government authorities, and providing advice on various policy, administrative and governance-related matters.',
];

return [
    [
        'title'     => 'How to Get Financial Assistance for Medical Treatment Through the Prime Minister’s National Relief Fund (PMNRF)',
        'category'  => 'Social Development',
        'summary'   => 'A step-by-step guide to seeking help with medical expenses through the Prime Minister’s National Relief Fund, covering the documents usually needed and how Members of Parliament can help applicants approach the authorities.',
        'slug'      => 'pmnrf-medical-assistance',
        'image'     => 'assets/images/articles/pmnrf-medical-assistance-1200.jpg',
        'image_alt' => 'Daksh Jain receiving a signed document from an official in an office with a world map on the wall',
        'body'      => [
            ['p', 'Many people are unaware that financial assistance for medical treatment may be available through the Prime Minister’s National Relief Fund (PMNRF). This assistance can be helpful for eligible patients and families facing financial difficulties due to serious illnesses and high medical expenses.'],
            ['p', 'This article provides a simple guide to understanding the application process, the documents that may be required, and the possible role of Members of Parliament (MPs) in helping applicants approach the concerned authorities.'],

            ['h2', 'How to Apply for Financial Assistance'],
            ['h3', '1. Approach Your Member of Parliament (MP)'],
            ['p', 'If you or a family member is undergoing medical treatment in a hospital and is unable to afford the expenses, you may approach your constituency’s Lok Sabha MP and enquire about seeking financial assistance through the PMNRF.'],
            ['p', 'Explain your financial circumstances and provide the relevant medical documents to support your request. You may request the MP’s office to guide you regarding the recommendation and application process.'],
            ['h3', '2. Obtain a Medical Estimate from the Hospital'],
            ['p', 'Request an official estimate of the treatment expenses from the hospital where the patient is undergoing treatment.'],
            ['p', 'The estimate should be duly certified by the hospital and include relevant medical details, the diagnosis, the proposed treatment and the expected expenses.'],
            ['p', 'Ensure that the estimate is current and that all medical information is accurate.'],
            ['h3', '3. Prepare the Required Documents'],
            ['p', 'Keep the following documents ready, as applicable:'],
            ['ul', [
                'The prescribed PMNRF application form.',
                'A recommendation letter from the MP, if required.',
                'The hospital’s certified treatment estimate.',
                'Relevant medical reports and the treating doctor’s recommendations.',
                'The patient’s Aadhaar card and complete contact details or other accepted identity proof.',
                'Bank account details and supporting documents, if requested.',
                'An income certificate or other evidence of family income, if required.',
                'Any additional documents specified by the concerned authorities.',
            ]],
            ['p', 'It is advisable to check the latest official requirements before submitting the application to ensure that all necessary documents are included.'],
            ['h3', '4. Submit the Application to the Prime Minister’s Office (PMO)'],
            ['p', 'After completing the application along with the recommendation letter and collecting the necessary documents, submit them through the prescribed PMNRF application procedure.'],
            ['p', 'Before submitting the application, verify the current submission method and the required documents.'],
            ['p', 'Keep copies of all submitted documents for future reference, along with any acknowledgement or reference number provided.'],
            ['h3', '5. Can You Approach a Rajya Sabha MP?'],
            ['p', 'If you are unable to approach your constituency’s Lok Sabha MP, you may also contact a Rajya Sabha MP representing your state and explain your circumstances.'],
            ['p', 'You may request the MP’s assistance in forwarding or recommending your application to the concerned authorities.'],
            ['p', 'A recommendation does not guarantee approval. The final decision rests with the competent authorities in accordance with the applicable rules and procedures.'],
            ['h3', '6. Wait for the Application to Be Reviewed'],
            ['p', 'Once the application has been submitted, the concerned authorities will examine the request and its supporting documents.'],
            ['p', 'If the application meets the applicable criteria and is approved, financial assistance may be sanctioned towards eligible medical expenses. The decision and the amount of assistance depend on the individual case and the applicable guidelines.'],
            ['p', 'Please remember that submitting an application or obtaining a recommendation from an MP does not guarantee that financial assistance will be granted.'],

            ['h2', 'Do Not Hesitate to Seek Help'],
            ['p', 'Members of Parliament can help citizens approach the appropriate government authorities and understand the assistance mechanisms available to them.'],
            ['p', 'If you or someone in your family is facing serious medical expenses and financial difficulties, consider approaching your MP’s office to enquire about the possibility of assistance through the PMNRF.'],
            ['p', 'Do not hesitate to explain your situation and ask for guidance. You may also enquire about other government schemes, state-level medical assistance programmes and hospital-based support that could be available to you.'],
            ['p', 'Seeking information at the right time can help families understand their options and explore possible avenues of financial support during difficult circumstances.'],

            ['h2', 'Important Information'],
            ['ul', [
                'Financial assistance is subject to the applicable guidelines and approval by the competent authorities.',
                'Verify the latest application procedure and documentation requirements through official government sources before submitting your request.',
                'Do not pay agents or intermediaries who promise guaranteed approval of financial assistance.',
                'Keep copies of your application and supporting documents, and retain any acknowledgement or reference number provided.',
                'If the patient requires urgent treatment, do not delay necessary medical care while waiting for a decision on financial assistance.',
            ]],
            ['p', 'For official information, visit the Prime Minister of India’s website:'],
            ['link', 'pmindia.gov.in', 'https://www.pmindia.gov.in/'],
            ['p', 'Please share this information so that more people become aware of the possible financial assistance available to patients and families facing difficult medical circumstances.'],

            ['note', 'Disclaimer', [
                'This article has been prepared for public awareness and informational purposes based on the author’s understanding of the subject. The information provided is general in nature and should not be treated as an official statement of the Government of India or as a guarantee of financial assistance.',
                'Application procedures, documentation requirements and eligibility conditions may vary according to the applicable rules and protocols. Readers are advised to verify the latest information through official government sources or the concerned authorities before taking any action.',
            ]],
            ['note', 'About the Author', array_merge($about_author, [
                'Through his work, Shri Daksh Jain seeks to promote public awareness, encourage access to welfare initiatives and contribute to the betterment of society.',
            ])],
        ],
    ],
    [
        'title'     => 'How to Visit Rashtrapati Bhavan, New Delhi',
        'subtitle'  => 'Experience India’s Presidential Heritage: A Complete Guide to Visiting Rashtrapati Bhavan',
        'category'  => 'Parliament and Institutions',
        'summary'   => 'A practical guide to visiting Rashtrapati Bhavan through the official booking portal, with a brief history of the building and an overview of the Main Building, Museum, Amrit Udyan and Change of Guard visitor experiences.',
        'slug'      => 'visiting-rashtrapati-bhavan',
        'image'     => 'assets/images/articles/visiting-rashtrapati-bhavan-1200.jpg',
        'image_alt' => 'Daksh Jain standing with President Droupadi Murmu and a guest holding a framed painting, beside the national flag',
        'body'      => [
            ['p', 'India is home to many historic and magnificent buildings, but one of the most remarkable is Rashtrapati Bhavan, the official residence and workplace of the President of India.'],
            ['p', 'Located on Raisina Hill in New Delhi, Rashtrapati Bhavan is more than an iconic government building. It is an important part of India’s constitutional, architectural and democratic heritage. Members of the public can visit designated parts of the President’s Estate through the official visitor-booking system, subject to availability and security requirements.'],
            ['p', 'The official visitor portal offers access to several visitor experiences, including the Rashtrapati Bhavan Main Building, Rashtrapati Bhavan Museum, Amrit Udyan and the Change of Guard Ceremony. Each experience has its own booking arrangements and visiting guidelines.'],

            ['h2', 'A Brief History of Rashtrapati Bhavan'],
            ['p', 'Rashtrapati Bhavan was originally constructed as the residence of the Viceroy of India after the British Government decided in 1911 to shift the capital of British India from Calcutta (now Kolkata) to Delhi.'],
            ['p', 'The building was designed primarily by British architect Sir Edwin Lutyens, with Herbert Baker playing an important role in the architectural development of New Delhi. Construction began in 1912, and the building was completed in 1929 after approximately 17 years of work. It was originally known as the Viceroy’s House.'],
            ['p', 'Although its overall design reflects European classical architecture, Rashtrapati Bhavan incorporates numerous Indian architectural elements, including chhatris, chhajjas, jaalis and traditional decorative motifs. Its great dome draws inspiration from the Sanchi Stupa, while other features reflect Indian architectural and cultural traditions.'],
            ['p', 'Following India’s independence, the building became the official residence of the President of India and was renamed Rashtrapati Bhavan in 1950.'],
            ['p', 'Today, Rashtrapati Bhavan stands as a symbol of India’s constitutional institutions and democratic traditions. Its architecture, ceremonial spaces and historical significance make it one of the country’s most recognisable landmarks.'],

            ['h2', 'Who Can Visit Rashtrapati Bhavan?'],
            ['p', 'Members of the public can visit designated areas of Rashtrapati Bhavan, subject to the applicable booking procedures, security requirements and visitor guidelines.'],
            ['p', 'Visitors should carry the identification documents specified for their booking. Indian citizens and foreign nationals should check the current identification requirements on the official visitor portal before travelling.'],
            ['p', 'Entry may be restricted or cancelled on certain dates due to official functions, security arrangements or other administrative requirements. Therefore, visitors should confirm availability before making travel plans.'],

            ['h2', 'How to Book a Visit'],
            ['p', 'The easiest way to arrange a visit is through the official Rashtrapati Bhavan visitor portal:'],
            ['link', 'Official booking website: visit.rashtrapatibhavan.gov.in', 'https://visit.rashtrapatibhavan.gov.in/'],
            ['p', 'The portal provides separate booking options for the Main Building, Museum, Amrit Udyan and the Change of Guard Ceremony.'],
            ['p', 'According to the official visitor information, advance online booking can generally be made up to seven days before the visit. However, availability, visiting hours and booking conditions may vary by circuit and date.'],

            ['h2', 'Rashtrapati Bhavan Main Building'],
            ['p', 'The Main Building is generally open to visitors from Tuesday to Sunday, except on Mondays, gazetted holidays and other dates notified by the authorities.'],
            ['p', 'The official visitor information lists visiting hours from 9:30 AM to 4:30 PM, with the last entry at 4:00 PM. The building is visited through designated time slots, subject to availability.'],
            ['p', 'Before booking, check the portal for the available date, time slot, applicable registration charges and the instructions relevant to your visit.'],
            ['p', 'Do not rely on outdated information about booking windows, timings or ticket prices, as these details can change.'],

            ['h2', 'What Can You See Inside Rashtrapati Bhavan?'],
            ['p', 'The Main Building visitor circuit provides an opportunity to explore selected ceremonial, historical and architectural spaces associated with the President’s official residence.'],
            ['p', 'Depending on the current visiting circuit and the areas open to visitors, the tour may include:'],
            ['ul', [
                'The Forecourt',
                'Ashok Mandap',
                'Ganatantra Mandap',
                'The Banquet Hall, also known as Brahmaputra',
                'The Library, also known as Saraswati',
                'The Saryu and Satluj rooms',
                'Janjatiya Darpan (Tribal Gallery)',
                'Sutrakala Darpan (Textiles Gallery)',
                'Other significant spaces within the Main Building',
            ]],
            ['p', 'The precise route and the spaces accessible to visitors may change according to official arrangements. Check the current description of the Main Building circuit on the visitor portal before your visit.'],

            ['h2', 'Rashtrapati Bhavan Museum'],
            ['p', 'The Rashtrapati Bhavan Museum is another important attraction within the President’s Estate. It offers visitors an opportunity to learn about India’s presidential history, heritage, art and democratic traditions.'],
            ['p', 'The museum complex contains historical objects, presidential memorabilia, artworks and interactive exhibits. Its displays use a range of modern presentation techniques to help visitors understand important events and traditions associated with the presidency.'],
            ['p', 'According to the official visitor portal, Museum Phase II has remained closed to the public since 6 October 2025, until further notice. Museum Phase I remains open for public visits, subject to the applicable booking arrangements and restrictions.'],
            ['p', 'The museum is generally open from Tuesday to Sunday, from 9:30 AM to 5:00 PM, with the last entry at 4:00 PM. Visitors should verify the current schedule, charges and availability before planning their visit.'],
            ['link', 'Museum information and booking: visit.rashtrapatibhavan.gov.in', 'https://visit.rashtrapatibhavan.gov.in/'],

            ['h2', 'Amrit Udyan'],
            ['p', 'Amrit Udyan, formerly known as the Mughal Gardens, is one of the most celebrated attractions of Rashtrapati Bhavan.'],
            ['p', 'The gardens feature a variety of landscaped spaces and horticultural collections. Depending on the season and the areas open to visitors, these may include the Rectangular Garden, Long Garden, Circular Garden, Herbal Garden, Musical Garden and Spiritual Garden.'],
            ['p', 'Amrit Udyan is opened to the public during designated seasonal and special visiting periods. Opening dates, timings, entry arrangements and booking requirements are announced separately.'],
            ['p', 'Visitors should check the official portal for the latest announcement before planning a visit, as the gardens are not necessarily open throughout the year.'],
            ['link', 'Official website: visit.rashtrapatibhavan.gov.in', 'https://visit.rashtrapatibhavan.gov.in/'],

            ['h2', 'The Change of Guard Ceremony'],
            ['p', 'The Change of Guard Ceremony is another public visitor experience associated with Rashtrapati Bhavan. It showcases the ceremonial traditions and duties of the President’s Bodyguard.'],
            ['p', 'The ceremony generally takes place on Saturdays, except on gazetted holidays and other dates when it may be cancelled or rescheduled. The precise time and arrangements should be confirmed through the official visitor portal.'],
            ['p', 'This ceremony offers visitors an opportunity to observe an important ceremonial tradition associated with the President of India.'],
            ['p', 'Advance registration or booking may be required, depending on the current arrangements. Always check the official website before travelling to attend.'],

            ['h2', 'Can You Request a Special or Urgent Visit?'],
            ['p', 'Individuals or organisations may sometimes wish to make an official enquiry regarding a visit for a particular purpose. Any such request should be directed through the appropriate official channels and will remain subject to the rules, availability and security procedures of the President’s Secretariat.'],
            ['p', 'If you have a specific reason for requesting a special visit, you may contact the relevant official office to ask whether any procedure is available for your circumstances.'],
            ['p', 'Depending on the nature of the enquiry, you may be asked to provide details such as:'],
            ['ul', [
                'Name of the visitor or organisation.',
                'Contact details.',
                'Number of proposed visitors.',
                'Proposed date of the visit.',
                'Purpose of the visit.',
                'Any supporting documents requested by the concerned office.',
            ]],
            ['p', 'These are general details that may be relevant to an official enquiry, not a confirmed list of mandatory requirements for special entry.'],
            ['p', 'A recommendation from an MP, government officer or other public authority does not automatically guarantee access to Rashtrapati Bhavan. Visitors must comply with the official booking procedure and any additional approval or security requirements communicated by the President’s Secretariat.'],
            ['p', 'For an ordinary public visit, the official visitor-booking portal should be the first point of reference.'],

            ['h2', 'Entry and Security Guidelines'],
            ['p', 'Rashtrapati Bhavan is a high-security constitutional institution. All visitors must comply with the security instructions and restrictions applicable on the day of their visit.'],
            ['p', 'The entry gate depends on the visitor circuit booked. For example, the Main Building visitor circuit uses a designated entry point near Gate No. 38, while the Rashtrapati Bhavan Museum is accessed through Gate No. 30 on Mother Teresa Crescent Road. Amrit Udyan uses Gate No. 35 when that visitor circuit is open.'],
            ['p', 'Visitors should:'],
            ['ul', [
                'Carry the visitor pass and valid identification documents specified for their booking.',
                'Arrive at the designated entry gate at the allotted time.',
                'Follow instructions issued by security personnel.',
                'Check the list of permitted and prohibited items before travelling.',
                'Avoid carrying restricted items, as these may not be permitted inside.',
                'Follow photography and other visitor restrictions communicated by the authorities.',
            ]],
            ['p', 'Entry gates, security procedures and access arrangements may change. Always follow the instructions provided with your booking confirmation.'],

            ['h2', 'How to Reach Rashtrapati Bhavan'],
            ['p', 'Rashtrapati Bhavan is located on Raisina Hill in New Delhi.'],
            ['p', 'Visitors can reach the general area by road, bus or Delhi Metro. Central Secretariat and Patel Chowk are among the nearby metro stations, although the most convenient station may depend on the visitor circuit and entry gate.'],
            ['p', 'Because the Main Building, Museum and Amrit Udyan have designated entry points, confirm the correct gate before starting your journey. Allow additional time for reaching the gate and completing security checks.'],
            ['p', 'Do not assume that the entrance for one visitor circuit is also the entrance for another.'],

            ['h2', 'A Unique Experience of India’s Heritage'],
            ['p', 'A visit to Rashtrapati Bhavan is much more than an ordinary sightseeing tour. It offers an opportunity to experience the architecture, history, traditions and constitutional heritage associated with one of India’s most important institutions.'],
            ['p', 'The building combines British-era planning with Indian architectural influences, creating a distinctive landmark on Raisina Hill. Its ceremonial halls, galleries, museum, gardens and public visitor experiences provide a glimpse into India’s historical journey and the traditions of the presidency.'],
            ['p', 'Whether you are interested in Indian history, architecture, public administration, constitutional institutions or Delhi’s cultural heritage, Rashtrapati Bhavan is an experience worth considering.'],

            ['h2', 'Experience and Recommendation'],
            ['p', 'For anyone visiting New Delhi, Rashtrapati Bhavan is a destination worth considering. It provides a valuable opportunity to learn about India’s architectural heritage, presidential traditions and constitutional institutions.'],
            ['p', 'The author’s recommendation is to plan your visit in advance, select the appropriate visitor circuit and carefully review the latest official instructions. Booking ahead and checking the entry requirements can help make your visit smoother and more informative.'],
            ['p', 'Before travelling, always check the official visitor portal for booking availability, timings, applicable charges, entry requirements and any temporary restrictions.'],

            ['h2', 'Official Information and Booking'],
            ['p', 'For the latest information about visiting Rashtrapati Bhavan, use the following official resources:'],
            ['link', 'Visitor booking portal: visit.rashtrapatibhavan.gov.in', 'https://visit.rashtrapatibhavan.gov.in/'],
            ['link', 'Official Rashtrapati Bhavan website: rashtrapatibhavan.gov.in', 'https://rashtrapatibhavan.gov.in/'],
            ['p', 'These websites provide information about the visitor circuits, booking procedures, visiting hours and other applicable guidelines.'],

            ['note', 'Disclaimer', [
                'This article has been prepared for general information and public awareness based on the author’s understanding of the subject and information available from official sources.',
                'Visiting hours, booking procedures, registration charges, entry gates, identification requirements and security protocols may change from time to time. Certain visitor circuits may be temporarily closed or subject to special restrictions due to official functions or administrative requirements.',
                'Readers are advised to verify the latest information directly through the official Rashtrapati Bhavan visitor portal before making travel arrangements. Any special visit request remains subject to the applicable rules and approval of the competent authorities.',
            ]],
            ['note', 'About the Author', array_merge($about_author, [
                'Through his work, Shri Daksh Jain seeks to promote public awareness, encourage informed engagement with public institutions and contribute to community development and the betterment of society.',
            ])],
        ],
    ],
    [
        'title'     => 'Exploring the Heart of Indian Democracy: A Guide to Visiting Parliament House',
        'category'  => 'Parliament and Institutions',
        'summary'   => 'An introduction to visiting Parliament House in New Delhi: the ways to arrange a visit, from inter-session show-rounds and visitors’ gallery passes to PRIDE study programmes, and how to make the most of the experience.',
        'slug'      => 'visiting-parliament-house',
        'image'     => 'assets/images/articles/visiting-parliament-house-1200.jpg',
        'image_alt' => 'Daksh Jain standing on the sandstone forecourt in front of the new Parliament building in New Delhi',
        'body'      => [
            ['p', 'India’s Parliament is more than an architectural landmark; it is the centre of the country’s democratic governance. It is where elected representatives debate national issues, formulate policies, introduce legislation and make decisions that shape the future of the nation. For anyone interested in Indian history, politics, constitutional values and democratic institutions, visiting Parliament House in New Delhi can be an enriching experience.'],
            ['p', 'As Daksh Jain, a social worker and public policy enthusiast, emphasises, understanding Parliament is essential to understanding Indian democracy. A visit to this historic institution offers an opportunity to appreciate the country’s democratic journey, its parliamentary traditions and the responsibilities associated with public service.'],

            ['h2', 'A Symbol of India’s Democratic Heritage'],
            ['p', 'India’s Parliament complex represents the country’s constitutional and democratic aspirations. The original Parliament House (the Old Building), now known as Samvidhan Sadan, is a remarkable example of historic architecture. Its circular design, imposing columns and distinctive interiors reflect the architectural vision of its time.'],
            ['p', 'The new Parliament building, known as Sansad Bhavan (Parliament House), represents India’s aspirations for the future. Inaugurated in May 2023, it provides modern facilities while retaining the importance of India’s parliamentary traditions.'],
            ['p', 'Together, these two buildings reflect the evolution of Indian democracy, connecting the nation’s historical foundations with its contemporary governance.'],

            ['h2', 'How to Visit Parliament House'],
            ['p', 'Visiting Parliament requires prior permission and compliance with established security procedures. The process depends on whether Parliament is in session or in its inter-session period.'],
            ['h3', '1. Visiting During the Inter-Session Period'],
            ['p', 'During the period when Parliament is not in session, visitor show-rounds may be organised on working days, subject to official permissions, security clearance and administrative arrangements.'],
            ['p', 'These visits may provide an opportunity to see designated areas of the Parliament complex, including the Lok Sabha and Rajya Sabha Chambers and the historic Central Hall, subject to the arrangements applicable at the time.'],
            ['p', 'Official visitor arrangements generally exclude weekends, gazetted holidays and specified periods immediately before and during parliamentary sessions.'],
            ['p', 'Group visits may also be permitted under prescribed conditions, including advance applications and security verification.'],
            ['h3', '2. Visiting Through Hon’ble Member of Parliament'],
            ['p', 'Another route to visiting Parliament is through the recommendation of a Member of Parliament.'],
            ['p', 'Individuals interested in observing parliamentary proceedings may request an MP to sponsor their application for a visitors’ gallery pass. The request may be made to a Lok Sabha or Rajya Sabha member, depending on the House whose proceedings the visitor wishes to observe.'],
            ['p', 'However, an Hon’ble MP’s recommendation does not automatically guarantee admission. Applications are subject to approval, security verification, seating capacity and the applicable parliamentary rules.'],
            ['p', 'Visitors should make their requests well in advance and provide the necessary personal information and identification documents.'],
            ['h3', '3. Visiting Through Official Study Programmes'],
            ['p', 'The Parliament Secretariat, through the Parliamentary Research and Training Institute for Democracies (PRIDE), also facilitates study visits for eligible groups, including students, scholars, government officials and other participants.'],
            ['p', 'These programmes may include an orientation on India’s parliamentary system, briefings on parliamentary procedures and visits to designated areas of Parliament.'],
            ['p', 'Such programmes provide a valuable opportunity to understand how India’s legislative institutions function.'],

            ['h2', 'When to Visit Parliament'],
            ['p', 'There are two principal ways to experience Parliament, depending on the parliamentary calendar.'],
            ['h3', '1. A Show-Round of the Parliament Building'],
            ['p', 'During the inter-session period, authorised visitors may have the opportunity to explore designated parts of the Parliament complex.'],
            ['p', 'A show-round can offer insights into the architectural design, parliamentary chambers and historical significance of the institution. It is particularly useful for visitors interested in India’s political history and constitutional development.'],
            ['h3', '2. Attending a Parliamentary Session'],
            ['p', 'For those interested in witnessing democracy in action, observing a live parliamentary session can be a memorable experience.'],
            ['p', 'Visitors who obtain an approved public gallery pass may observe proceedings from the designated gallery, subject to the rules of the respective House.'],
            ['p', 'The Lok Sabha and Rajya Sabha provide important platforms for parliamentary debates, legislative discussions and scrutiny of government policies.'],
            ['p', 'It is important to remember that gallery seating is limited and admission is subject to official approval. Visitors must follow security instructions and maintain proper decorum inside the House.'],

            ['h2', 'Understanding the Visitors’ Galleries'],
            ['p', 'Parliament has different galleries designed for specific categories of visitors and authorised individuals.'],
            ['p', 'Some of the important galleries include:'],
            ['dl', [
                ['Public Gallery', 'Provides approved visitors with an opportunity to observe parliamentary proceedings.'],
                ['Distinguished Visitors’ Gallery', 'Intended for distinguished guests and other individuals admitted under the applicable arrangements.'],
                ['Diplomatic Gallery', 'Reserved for authorised diplomatic visitors.'],
                ['Speaker’s Gallery', 'Designated for individuals admitted under the relevant parliamentary arrangements.'],
            ]],
            ['p', 'Each gallery has its own admission requirements and seating arrangements. Access is not open to all visitors and depends on the nature of the pass issued.'],
            ['p', 'Observing parliamentary proceedings from the public gallery can be an especially valuable experience. It allows visitors to witness debates, discussions and the functioning of India’s legislative democracy firsthand.'],

            ['h2', 'Making the Most of Your Visit'],
            ['p', 'A visit to Parliament becomes more meaningful when accompanied by an understanding of India’s constitutional and political history.'],
            ['p', 'Before visiting, consider familiarising yourself with:'],
            ['ul', [
                'The historical development of the Indian Constitution.',
                'The respective roles of the Lok Sabha and Rajya Sabha.',
                'The legislative process and how parliamentary debates take place.',
                'The responsibilities of Members of Parliament.',
                'The importance of parliamentary committees in examining policies and legislation.',
            ]],
            ['p', 'Visitors should also follow all official instructions regarding identification, security checks, mobile phones, photography and permitted areas. Entry is strictly regulated, and visitors should carry the identification documents specified in their approved visitor instructions.'],

            ['h2', 'Conclusion: An Experience Beyond Architecture'],
            ['p', 'A visit to Parliament House is much more than an opportunity to see an impressive government building. It offers a closer understanding of India’s democratic institutions, constitutional principles and parliamentary traditions.'],
            ['p', 'Whether exploring the historic architecture of Samvidhan Sadan, visiting Sansad Bhavan or observing a parliamentary debate from an authorised gallery, visitors gain a deeper appreciation of the institutions that sustain Indian democracy.'],
            ['p', 'Parliament reminds us that democracy is not simply about elections; it is also about representation, accountability, debate and the collective responsibility of building a nation.'],
            ['p', 'For students, researchers, citizens and anyone interested in public affairs, exploring the heart of Indian democracy can be an inspiring and educational experience.'],

            ['note', 'Author’s Note / Disclaimer', [
                'This article has been written by the author based on his personal knowledge, understanding and available information about the subject. It is intended solely for general awareness and informational purposes. The author does not claim that all the information, procedures or details mentioned herein are officially verified, guaranteed or universally applicable. Readers are advised to independently confirm the latest rules, guidelines, permissions and visiting procedures with the concerned Parliament authorities before making any plans. The author and publisher shall not be held responsible for any changes, inaccuracies or discrepancies in the information provided.',
            ]],
        ],
    ],
];
