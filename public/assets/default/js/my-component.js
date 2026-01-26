'use strict';

function MyComponent() {
  return (
    <div className="mb-30">
      <section className="mt-15 mb-60 lms-blog blog-single-post">
        <div className="container">
          <div className="row">
            {/* Main Content */}
            <div className="col-12 col-lg-9 col-md-9">
              <div className="post-show pb-0 pr-50">
                <div className="post-image">
                  <img
                    src={post.image}
                    className="img-cover img-lg"
                    alt={post.title}
                    title={post.title}
                    loading="eager"
                  />
                </div>

                {/* Post Content */}
                <div
                  dangerouslySetInnerHTML={{ __html: post.content }}
                />
              </div>

              {/* Related Blogs */}
              <div className="row mb-50">
                {post.relatedPosts?.map((item, index) => (
                  <div key={index} className="col-12 col-md-4 col-lg-4 mb-30">
                    <div
                      className="rurera-blog blog-medium"
                      itemScope
                      itemType="https://schema.org/NewsArticle"
                    >
                      <div className="blog-grid-detail">
                        <span className="badge created-at d-flex align-items-center">
                          <span>{item.date}</span>
                        </span>

                        <h2 className="blog-grid-title mt-10">
                          <a href={item.url}>{item.title}</a>
                        </h2>
                      </div>

                      <div className="blog-grid-image">
                        <img
                          src={item.image}
                          className="img-cover"
                          alt={item.title}
                        />
                      </div>
                    </div>
                  </div>
                ))}
              </div>
            </div>

            {/* Sidebar */}
            {headingsArray.length > 0 && (
              <div className="col-12 col-lg-3 col-md-3">
                <div className="blog-sidebar">
                  <h2 className="mb-20">Content</h2>

                  <nav>
                    <ul>
                      {headingsArray.map((heading, index) => (
                        <li key={index}>
                          <a href={`#${heading.id}`}>
                            {heading.text}
                          </a>
                        </li>
                      ))}
                    </ul>
                  </nav>
                </div>
              </div>
            )}
          </div>
        </div>
      </section>
    </div>
  );
}

const domContainer = document.querySelector('#react-container');
const root = ReactDOM.createRoot(domContainer);
root.render(<MyComponent />);