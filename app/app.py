from flask import Flask, render_template
from flask_sqlalchemy import SQLAlchemy 

app = Flask(__name__)


app.config['SQLALCHEMY_DATABASE_URI'] = 'mysql://root:admin123@localhost/student_management'
app.config['SQLALCHEMY_TRACK_MODIFICATIONS'] = False


db = SQLAlchemy(app)

class Student(db.Model):  
    id = db.Column(db.Integer, primary_key=True)
    name = db.Column(db.String(100), nullable=False)
    age = db.Column(db.Integer, nullable=False)
    course = db.Column(db.String(100), nullable=False)

    def __repr__(self):  
        return f"Student('{self.id}', '{self.name}', {self.age}, '{self.course}')"

@app.route('/')
def home():
    students = Student.query.all()  
    return render_template('index.html', students=students)

if __name__ == '__main__':
    app.run(debug=True)
